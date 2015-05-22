<?php

/* D:\www\spk\GitHub-SparkLee\StudyPHP\LaravelOctoberCms/themes/responsiv-flat/pages/shop/product.htm */
class __TwigTemplate_12dd93ba71a66d11d28c18d0899b52851fd7d8b4758b1f7163597a29d0339743 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo $this->env->getExtension('CMS')->startBlock('styles'        );
        // line 2
        echo "    <link href=\"";
        echo $this->env->getExtension('CMS')->themeFilter(array(0 => "assets/vendor/slick/slick.css"));
        // line 4
        echo "\" rel=\"stylesheet\">
";
        // line 1
        echo $this->env->getExtension('CMS')->endBlock(true        );
        // line 6
        echo $this->env->getExtension('CMS')->startBlock('scripts'        );
        // line 7
        echo "    <script src=\"";
        echo $this->env->getExtension('CMS')->themeFilter(array(0 => "assets/vendor/slick/slick.js"));
        // line 9
        echo "\"></script>
    <script>
        \$(document).ready(function() {
            \$('#shopImages').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnHover: true,
                arrows: false
            });
        })
    </script>
";
        // line 6
        echo $this->env->getExtension('CMS')->endBlock(true        );
        // line 27
        echo "
<section id=\"layout-title\">
    <div class=\"container\">
        <h3>Product title</h3>
    </div>
</section>

<div class=\"container shop-item\">
    <div class=\"row\">
        <div class=\"col-sm-9\">

            <div class=\"row\">
                <div class=\"col-sm-6\">

                    <div id=\"shopImages\" class=\"shop-images\">
                        <div>
                            <a href=\"";
        // line 43
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/shop/macbook.jpg");
        echo "\">
                                <img src=\"";
        // line 44
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/shop/macbook.jpg");
        echo "\" class=\"img-responsive main\" alt=\"\">
                            </a>
                        </div>
                        <div>
                            <a href=\"";
        // line 48
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/shop/macpro.jpg");
        echo "\">
                                <img src=\"";
        // line 49
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/shop/macpro.jpg");
        echo "\" class=\"img-responsive\" alt=\"\">
                            </a>
                        </div>
                    </div>

                </div>
                <div class=\"col-sm-6\">

                    <p class=\"text-muted\">This is my boss, Jonathan Hart, a self-made millionaire, he's quite a guy. This is Mrs H., she's gorgeous, she's one lady who knows how to take care of herself.</p>
                    <ul class=\"rating list-inline\">
                        <li><i class=\"icon-star\"></i></li>
                        <li><i class=\"icon-star\"></i></li>
                        <li><i class=\"icon-star\"></i></li>
                        <li><i class=\"icon-star\"></i></li>
                        <li><i class=\"icon-star\"></i></li>
                    </ul>
                    <span class=\"text-muted reviews\">(12 reviews)</span>
                    <div>
                        <div class=\"price-block\">
                            <span class=\"price\">US \$99.99 x</span>
                            <input type=\"number\" name=\"pcs\" value=\"1\" class=\"form-control\">
                        </div>
                    </div>
                    <a class=\"btn btn-info\" href=\"#\"><i class=\"icon-shopping-cart\"></i> Add to cart</a>
                </div>

            </div>

            <!-- Item Description -->
            <div class=\"row\">
                <div class=\"col-sm-12\">
                    <h4 class=\"headline\"><span>Product details</span></h4>
                    <p>Brisket tongue kielbasa short ribs jowl pancetta short loin tenderloin pork chop flank shank doner strip steak ground round.</p>
                    <p>Rump capicola bacon salami chuck meatloaf swine ground round tail biltong ball tip. Pork shankle pig turducken kielbasa. Pancetta pork belly bresaola ham hock capicola strip steak beef ribs ham jowl. Shoulder drumstick short loin beef venison ribeye. Meatloaf tail ball tip capicola pork loin chuck brisket.</p>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-sm-12\">
                    <h4 class=\"headline\"><span>Similar products</span></h4>
                    <div class=\"row\">
                        <div class=\"col-sm-4\">
                            <div class=\"shop-product featured\">
                                <a href=\"#\"><img src=\"";
        // line 91
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/shop/imac.png");
        echo "\" class=\"img-responsive\" alt=\"\"></a>
                                <a href=\"#\"><h6>Product #1</h6></a>
                                <p class=\"price\">
                                    <span class=\"old\">\$80.99</span>
                                    <span class=\"new\">\$59.99</span>
                                </p>
                                <a href=\"#\" class=\"btn btn-sm btn-info\"><i class=\"icon-shopping-cart\"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class=\"col-sm-4\">
                            <div class=\"shop-product\">
                                <a href=\"#\"><img src=\"";
        // line 102
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/shop/macbook.jpg");
        echo "\" class=\"img-responsive\" alt=\"\"></a>
                                <a href=\"#\"><h6>Product #2</h6></a>
                                <p>
                                    \$200.00
                                </p>
                                <a href=\"#\" class=\"btn btn-sm btn-info\"><i class=\"icon-shopping-cart\"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class=\"col-sm-4\">
                            <div class=\"shop-product\">
                                <a href=\"#\"><img src=\"";
        // line 112
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/shop/ipad.png");
        echo "\" class=\"img-responsive\" alt=\"\"></a>
                                <a href=\"#\"><h6>Product #3</h6></a>
                                <p>
                                    \$50.00
                                </p>
                                <a href=\"#\" class=\"btn btn-sm btn-info\"><i class=\"icon-shopping-cart\"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-sm-3\">
            ";
        // line 125
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('CMS')->partialFunction("shop/sidebar"        , $context['__cms_partial_params']        );
        unset($context['__cms_partial_params']);
        // line 126
        echo "        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "D:\\www\\spk\\GitHub-SparkLee\\StudyPHP\\LaravelOctoberCms/themes/responsiv-flat/pages/shop/product.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 126,  176 => 125,  160 => 112,  147 => 102,  133 => 91,  88 => 49,  84 => 48,  77 => 44,  73 => 43,  55 => 27,  53 => 6,  34 => 9,  31 => 7,  29 => 6,  27 => 1,  24 => 4,  21 => 2,  19 => 1,);
    }
}
