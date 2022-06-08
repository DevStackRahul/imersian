

<pre class="custom_scroll"><code class="html">data-ar="{% if product.variants.size > 1 %}{%if product.variant.featured_media.id == media.id %}{{product.selected_or_first_available_variant.sku}}{%else%}{% for variant in product.variants %}{%if variant.featured_media.id == media.id %}{{variant.sku}}{%endif%}{%endfor%}{%endif%}{%else%}{{product.selected_or_first_available_variant.sku}}{% endif %}"</code></pre>
