<?php namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Osiset\ShopifyApp\Objects\Values\ShopDomain;
use stdClass;
use App\User;
use App\CustomerRedact;

class CustomersRedactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Shop's myshopify domain
     *
     * @var ShopDomain|string
     */
    public $shopDomain;

    /**
     * The webhook data
     *
     * @var object
     */
    public $data;

    /**
     * Create a new job instance.
     *
     * @param string   $shopDomain The shop's myshopify domain.
     * @param stdClass $data       The webhook data (JSON decoded).
     *
     * @return void
     */
    public function __construct($shopDomain, $data)
    {
        $this->shopDomain = $shopDomain;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Convert domain
        $this->shopDomain = ShopDomain::fromNative($this->shopDomain,$this->data = $data);

      
        try {
            $shop = User::where('name', $this->shopDomain)->first();
            

            CustomerRedact::create([
                'shop_id'=>$shop->id,
                'shop_domain'=>$this->data->shop_domain,
                'customer_id'=>$this->data->customer->id,
                'customer_email'=>$this->data->customer->email,
                'customer_phone'=>$this->data->customer->phone,
                
            ]);

            return;
        }
        
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }
}