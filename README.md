[jQuery imageMap Plugin](https://github.com/georgeyord/imagemap)
================================
Overlay image map with effects on hover
--------------------------------


The jQuery ImageMap class adds elements (images) to the appropriate positions on the target element and executes some effect (default: resize with animation) when the mouse passes over (or click or any other event set) these elements.

## Getting Started

Include jQuery and the plugin on a page. Then select an element add the overlay:

```html
<script src="jquery.js"></script>
<script src="jquery.imagepap.js"></script>
<script>
$('#example1').imageMap(
{
    elements: [
        {
            image: "image1.png",
            link: "image1.htm",
            position: { top: 20,  left: 30 },
            size: { width: 50,  height: 100 },
            effect: { resize: { factor: 40 } }
        }
    ]
});
</script>
```

## Usage

### Main config
The config object MUST contain the elements array. Element structure explained later.
There are also the following OPTIONAL attributes:
- debug: if set true, extensive information is logged in console
- preloadImages: if set true a very simple preloading process is performed
- zIndex: set the zIndex when the effect is activated
- event: override default activation/deactivation events and duration of animation events
- effect: override the default values for the effects, explained in detail later
- mainPrefix: override the default prefix for css "mainPrefix"
- containerClass: override the default container class "containerClass"
- imageClass: override the default image class "imageClass"
- additionalImageClass: append more classes to imageClass mentioned above

### Element structure
- image: REQUIRED - path to image filename
- position: REQUIRED - distance from top/left corner of the target element
- size: REQUIRED - width/height of the initial image
- link: OPTIONAL - if set the image will be an active link
- effect: OPTIONAL override the default values for the effects, explained in detail later

### Effect structure
ImageMap supports resize effect and styling through css rules.
Resize config can contain either a "factor" to the final size or the exact "width".
Css config can contain any css styling rules.
