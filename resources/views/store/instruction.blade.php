

    <div id="main-wrapper">
      <!-- Content
  ============================ -->
      <div id="content" role="main">
        <!-- Docs Content
    ============================ -->
        <div class="idocs-content">
          <div class="container">
            <!-- Getting Started
        ============================ -->
            <section id="idocs_start">
              <p class="alert alert-info">
                If you have any questions related to this guide, please feel free to email us at <b>info@imersian.com</b>
              </p>
            </section>

            <hr class="divider" />

            <section id="idocs_installation">
              <h4>Step 01</h4>
              <p>
                You need an account in <a target="_blank" href="https://portal.imersian.com">portal.imersian.com</a> to complete this set up. Please
                sign up for an account if you don't have one
              </p>
            </section>

            <hr class="divider" />

            <section id="idocs_html_structure">
              <h4>Step 02</h4>
              <p>
                Go to Imersian App settings, then add Javascript snippet to the text area. This script needs to be copied from
                portal.imersian.com/integration section. A sample script is given below,
              </p>
              <pre><code class="html">&lt;script src=&quot;https://s3.ap-southeast-2.amazonaws.com/static.imersian/bundled.js&quot;&gt;&lt;/script&gt;  
    &lt;script type=&quot;text/javascript&quot;&gt;
    var ImersianWebClient = ImersianWebClient.default;
    ImersianWebClient.config(&quot;sdff-4c87-4f65-8c64-23er5re&quot;, &quot;viewer.imersian.com&quot;);
    ImersianWebClient.init();
&lt;/script&gt;
</code></pre>
            </section>
<iframe width="620" height="315" src="https://www.youtube.com/embed/1wvi-3vELeE"> </iframe>
            <hr class="divider" />

            <section id="idocs_sass">
              <h4>Step 03</h4>
              <p>
                Go to the Appearance tab of the Imersian App and configure colors, icons, text size, height and width for the buttons. There are 5
                types of buttons you can configure.
              </p>
              <ul>
                <li>3D view Button (open imersian 3D/AR viewer)</li>
                <li>In Home Button (View product in AR)</li>
                <li>Add to Wishlist Button (Add to a collection that can be viewed together with other products in AR)</li>
                <li>Remove Wishlist button (Remove a product from the collection)</li>
                <li>Remove Wishlist button (Remove a product from the collection)</li>
              </ul>
            </section>
<iframe width="620" height="315" src="https://www.youtube.com/embed/AI-RggUTgyY"> </iframe>
            <hr class="divider" />

            <section id="idocs_color_schemes">
              <h4>Step 4</h4>
              <p>
                Add a place holder below to anywhere that you need the above buttons to be rendered. Usually this can be added to the bottom of the
                main product image. Usually, the liquid file for the product image is <b>"main-product.liquid"</b>. But feel free to add anywhere you want to render the above 5 buttons
              </p>
              <pre><code class="html">{% include 'imersian-3D-AR-buttons'%}</code></pre>

            </section>
<iframe width="620" height="315" src="https://www.youtube.com/embed/pFuzpLmB_qQ"> </iframe>
            <hr class="divider" />

            <section id="idocs_sass">
              <h4>Step 05</h4>
              <p>
                Now our buttons are in place in your store. Then our app needs to know where we should display the 3D/AR viewer and needs to identify
                which 3D model of a variant should be rendered. Therefore, the following code snippet needs to be added to the element that should
                contain our 3D/AR viewer. Usually, this will be the main product image, it can be found in the “media.liquid” file Go to your online
                store admin panel, then go to <b>“Current Theme” -> “Edit code” -> search for media.liquid or main-product.liquid</b> (the file name
                depends on the theme).
              </p>
              {{-- add --}}
              <?php  echo  $contents = file_get_contents(resource_path('views/instruction-data-arr-code.blade.php')); ?>
              {{--end --}}
               
            </section>
<iframe width="620" height="315" src="https://www.youtube.com/embed/xrlI2YUpOkQ"> </iframe>
            <hr class="divider" />

            <section id="idocs_color_schemes">
              <h4>Step 6</h4>
              <p>
                If theme supports variants, there is a JavaScript function to handle variant selection that updates product price, availability and
                media content. Usually, this function can be found in theme.js or global.js files in the theme. Go to your online store admin panel,
                then go to <b>“Current Theme” -> “Edit code” -> search for theme.js or global.js</b> (the file name depends on the theme)
              </p>
              <pre><code class="html">var currentSku = document.querySelector(&quot;.imersian-variant-sku&quot;);

if (!currentSku) return;

currentSku.value = variant.sku;
ImersianWebClient.hasAddedToFavourites();  
              </code></pre>
            </section>
<iframe width="620" height="315" src="https://www.youtube.com/embed/ekKd0e2cUYI"> </iframe>
            <section id="idocs_color_schemes">
              Congratulations, Now your Shopify is successfully integrated with Imersian platform and it is 3D and AR ready. <br />You can contact us
              at <b>info@imersian.com</b> if you need any help
            </section>
          </div>
        </div>
      </div>
      <!-- Content end -->
    </div>

  
