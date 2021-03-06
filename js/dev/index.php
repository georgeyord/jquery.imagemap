<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <?php require_once './jquery.imagemap.php'; ?>
        <script language="javascript">
            $(document).ready(function() {
                // Used as a function callback
                var callback =
                function(e) {
                    var $this = $(this);
                    console.log('Function call back activated'.$this);
                    if ($this.attr('href'))
                        return confirm("Go to: "+$this.attr('href'));

                    e.preventDefault();
                };
                $('#main').imageMap({
                    // debug: true,
                    elements: [
                        // Resize effect active by default with default config
                        // Style effect active with custom css
                        {
                            image: "../../example/images/pisa/part_01.png",
                            link: "http://www.webwonder.gr",
                            position: {top: 74, left: 33},
                            size: {width: 166, height: 147},
                            effect: {
                                resize: { active: true },
                                style: {
                                    active: true,
                                    css: {
                                        background: 'rgba(255, 255, 190, .75)',
                                        borderRadius: '1000px',
                                        '-webkit-box-shadow': '0px 0px 15px 5px rgba(255, 255, 190, .75)',
                                        '-moz-box-shadow': '0px 0px 15px 5px rgba(255, 255, 190, .75)',
                                        boxShadow: '0px 0px 15px 5px rgba(255, 255, 190, .75)',
                                        boxSizing: "border-box"
                                    }
                                },
                                callback: {
                                    on: 'click',
                                    f: callback
                                }
                            }
                        },
                        // Resize effect active and custom width to animate
                        // Style effect inactive by default with default config
                        // Link active to external url
                        {
                            image: "../../example/images/pisa/part_02.png",
                            link: "http://www.webwonder.gr",
                            position: {top: 147, left: 233},
                            size: {width: 73, height: 59},
                            effect: {
                                resize: { active: true, width: 200 },
                            }
                        },
                        // Resize effect active by default with default config
                        // Style effect inactive by default
                        {
                            image: "../../example/images/pisa/part_03.png",
                            position: {top: 227, left: 93},
                            size: {width: 47, height: 71}
                        },
                        // Resize effect inactive
                        // Style effect active by default with default config
                        {
                            image: "../../example/images/pisa/part_04.png",
                            position: {top: 273, left: 226},
                            size: {width: 117, height: 100},
                            effect: {
                                resize: { active: false },
                                style: {
                                    active: true,
                                    css: {
                                        background: 'rgba(190, 255, 255, .75)',
                                        borderTopLeftRadius: '150px',
                                        borderBottomLeftRadius: '150px',
                                        borderBottomRightRadius: '150px'
                                    }
                                }
                            }
                        },
                        // Resize effect active by default with default config
                        // Style effect active by default with default config
                        {
                            image: "../../example/images/pisa/part_05.png",
                            position: {top: 322, left: 54},
                            size: {width: 161, height: 129},
                            effect: {
                                resize: { active: true },
                                style: { active: true }
                            }
                        },
                        // Resize effect inactive
                        // Style effect active with custom css
                        {
                            image: "../../example/images/pisa/part_06.png",
                            position: {top: 428, left: 214},
                            size: {width: 161, height: 128},
                            effect: {
                                resize: { active: false },
                                style: {
                                    active: true,
                                    css: {
                                        border: "5px solid darkblue",
                                        borderRadius: '1000px',
                                        boxSizing: "border-box"
                                    }
                                }
                            }
                        },
                        // Resize effect active by default custom factor to animate
                        // Style effect inactive by default
                        {
                            image: "../../example/images/pisa/part_07.png",
                            position: {top: 466, left: 50},
                            size: {width: 113, height: 91},
                            effect: {
                                resize: { active: true, factor: 70 },
                            }
                        },
                        // Resize effect inactive
                        // Style effect active by default with custom config
                        {
                            image: "../../example/images/pisa/part_08.png",
                            position: {top: 567, left: 91},
                            size: {width: 167, height: 151},
                            effect: {
                                resize: { active: false },
                                style: {
                                    active: true,
                                    css: {
                                        background: "#587898",
                                        border: "1px solid #333",
                                        borderRadius: '1000px',
                                        boxSizing: "border-box",
                                        padding: "2px 15px"
                                    }
                                }
                            }
                        },
                        // Resize effect active by default with default config
                        // Style effect inactive by default
                        // Link active to external url
                        {
                            image: "../../example/images/pisa/part_09.png",
                            link: "https://github.com/georgeyord/imageMap",
                            position: {top: 567, left: 284},
                            size: {width: 165, height: 155}
                        }
                    ]
                });
            });
        </script>
    </head>
    <body>
        <div id="main">
            <img src="../../example/images/pisa/main.jpg" alt="">
        </div>
    </body>
</html>