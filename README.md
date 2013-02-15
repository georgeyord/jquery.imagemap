[jQuery imageMap Plugin](https://github.com/georgeyord/imagemap)
================================
Overlay image map with effects on hover
--------------------------------

The **jQuery ImageMap** class adds elements (images) to the appropriate positions on the target element and executes some effect (default: resize with animation) when the mouse passes over (or click or any other event set) these elements.

## Demostration
**[Simple example](http://example.webwonder.gr/imagemap/example/example1.html)**
*[source](https://github.com/georgeyord/imagemap/blob/master/example/example1.html)*

**[Advanced example](http://example.webwonder.gr/imagemap/example/example2.html)**
*[source](https://github.com/georgeyord/imagemap/blob/master/example/example2.html)*

## Getting Started

Include jQuery and the plugin on a page. Then select an element add the overlay:

```html
<script src="jquery.js"></script>
<script src="jquery.imagemap.js"></script>
<script>
$('#example1').imageMap(
{
    elements: [
        {
            image: "image1.png",
            position: { top: 20,  left: 30 },
            size: { width: 50,  height: 100 }
        },
        {
            image: "image2.png",
            link: "image2.htm", // Make it an active link
            position: { top: 50,  left: 70 },
            size: { width: 50,  height: 100 }
        },
        {
            image: "image3.png",
            position: { top: 100,  left: 40 },
            size: { width: 50,  height: 100 },
            effect: {resize: {active: true, factor: 70} // Add custom effect configuration
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
ImageMap supports resize effect and styling through css rules. Each effect can be turned on/off by setting "active" attribute to true/false.  
*Example to turn "resize" off and "style" on:* ```effect: {resize: {active: false}, style: {active: true}}```

- **Resize** config can contain either a "factor" to the final size or the exact "width".  
*Example with factor:* ```effect: {resize: {active: true, factor: 60}```  
*Example with width:* ```effect: {resize: {active: true, width: 100}```

- **Style** config can contain any css styling rules in css attribute.  
*Example with css:* ```effect: {style: {active: true, css: {background: "red"}}```
