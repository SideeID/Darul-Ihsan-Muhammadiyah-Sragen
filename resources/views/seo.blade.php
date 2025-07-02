<!-- Primary Meta Tags -->
<meta name="title" content="{{ $PAGE_TITLE }}">
<meta name="description" content="{{ $PAGE_DESCRIPTION }}">
<meta name="keywords" content="{{ $PAGE_KEYWORDS }}">
<link rel="canonical" href="{{ $PAGE_URL }}">

<!-- Open Graph / Facebook / WhatsApp -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $PAGE_URL }}">
<meta property="og:title" content="{{ $PAGE_TITLE }}">
<meta property="og:description" content="{{ $PAGE_DESCRIPTION }}">
<meta property="og:image" content="{{ $IMAGE_URL }}">
<meta property="og:locale" content="id_ID">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $PAGE_URL }}">
<meta property="twitter:title" content="{{ $PAGE_TITLE }}">
<meta property="twitter:description" content="{{ $PAGE_DESCRIPTION }}">
<meta property="twitter:image" content="{{ $IMAGE_URL }}">

<!-- Additional SEO Meta Tags -->
<meta name="robots" content="index, follow">
<meta name="author" content="{{ $AUTHOR_NAME }}">

<!-- Structured Data (JSON-LD) for SEO -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "url": "{{ $PAGE_URL }}",
  "name": "{{ $PAGE_TITLE }}",
  "description": "{{ $PAGE_DESCRIPTION }}",
  "image": "{{ $IMAGE_URL }}",
  "author": {
    "@type": "Person",
    "name": "{{ $AUTHOR_NAME }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ $BRAND_NAME }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ $LOGO_URL }}"
    }
  }
}
</script>

<!-- Favicon for Branding -->
<link rel="icon" href="{{ $LOGO_URL }}" type="image/x-icon">

<!-- Additional Optional Tags (sitemap link, etc.) -->
<link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">
