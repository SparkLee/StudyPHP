<?php

/* D:\www\spk\GitHub-SparkLee\StudyPHP\LaravelOctoberCms/themes/responsiv-flat/partials/nav.htm */
class __TwigTemplate_b0b3345ab70a7e2db481ecf89e64c800f32e3e6482ed15d92058d4cbbddf89d8 extends Twig_Template
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
        // line 2
        $context["links"] = array("home" => array(0 => "home", 1 => "Home"), "pages" => array("name" => "Pages", "sublinks" => array("about" => array(0 => "samples/about", 1 => "About Us"), "contact" => array(0 => "samples/contact", 1 => "Contact Us"), "pricing-table" => array(0 => "samples/pricing-table", 1 => "Pricing Table"), "services" => array(0 => "samples/services", 1 => "Services"), "signin" => array(0 => "samples/signin", 1 => "Sign In"), "register" => array(0 => "samples/register", 1 => "Register"), "error" => array(0 => "error", 1 => "Error Page"), "404" => array(0 => "404", 1 => "404 Page"))), "portfolio" => array("name" => "Portfolio", "sublinks" => array("portfolio" => array(0 => "portfolio/portfolio", 1 => "Portfolio"), "project" => array(0 => "portfolio/project", 1 => "Project"))), "blog" => array("name" => "Blog", "sublinks" => array("blog" => array(0 => "blog/blog", 1 => "Blog"), "post" => array(0 => "blog/post", 1 => "Blog Post"))), "shop" => array("name" => "Shop", "sublinks" => array("shop" => array(0 => "shop/shop", 1 => "Shop"), "product" => array(0 => "shop/product", 1 => "Product"), "cart" => array(0 => "shop/cart", 1 => "Cart"))), "ui-elements" => array(0 => "ui-elements", 1 => "UI Elements"));
        // line 44
        echo "
";
        // line 65
        echo "
";
        // line 66
        $context["nav"] = $this;
        // line 67
        echo "
<nav id=\"layout-nav\" class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-main-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"";
        // line 77
        echo $this->env->getExtension('CMS')->pageFilter("home");
        echo "\">Flat</a>
        </div>
        <div class=\"collapse navbar-collapse navbar-main-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                ";
        // line 81
        echo $context["nav"]->getrender_menu((isset($context["links"]) ? $context["links"] : null));
        echo "
                <li>
                    <button
                        onclick=\"window.location='";
        // line 84
        echo $this->env->getExtension('CMS')->pageFilter("samples/signin");
        echo "'\"
                        class=\"btn btn-sm navbar-btn btn-primary navbar-right hidden-sm hidden-xs\">
                        Sign in
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>";
    }

    // line 45
    public function getrender_menu($__links__ = null)
    {
        $context = $this->env->mergeGlobals(array(
            "links" => $__links__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 46
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
            foreach ($context['_seq'] as $context["code"] => $context["link"]) {
                // line 47
                echo "        <li class=\"";
                echo ((($context["code"] == (isset($context["currentPage"]) ? $context["currentPage"] : null))) ? ("active") : (""));
                echo " ";
                echo (($this->getAttribute($context["link"], "sublinks", array())) ? ("dropdown") : (""));
                echo "\">
            <a
                href=\"";
                // line 49
                echo (($this->getAttribute($context["link"], "sublinks", array())) ? ("#") : ($this->env->getExtension('CMS')->pageFilter((($this->getAttribute($context["link"], "page", array())) ? ($this->getAttribute($context["link"], "page", array())) : ($this->getAttribute($context["link"], 0, array(), "array"))))));
                echo "\"
                ";
                // line 50
                if ($this->getAttribute($context["link"], "sublinks", array())) {
                    echo "data-toggle=\"dropdown\"";
                }
                // line 51
                echo "                class=\"";
                echo (($this->getAttribute($context["link"], "sublinks", array())) ? ("dropdown-toggle") : (""));
                echo "\"
            >
                ";
                // line 53
                echo twig_escape_filter($this->env, (($this->getAttribute($context["link"], "name", array())) ? ($this->getAttribute($context["link"], "name", array())) : ($this->getAttribute($context["link"], 1, array(), "array"))), "html", null, true);
                echo "
                ";
                // line 54
                if ($this->getAttribute($context["link"], "sublinks", array())) {
                    echo "<span class=\"caret\"></span>";
                }
                // line 55
                echo "            </a>
            ";
                // line 56
                if ($this->getAttribute($context["link"], "sublinks", array())) {
                    // line 57
                    echo "                <span class=\"dropdown-arrow\"></span>
                <ul class=\"dropdown-menu\">
                    ";
                    // line 59
                    echo $this->getAttribute($this, "render_menu", array(0 => $this->getAttribute($context["link"], "sublinks", array())), "method");
                    echo "
                </ul>
            ";
                }
                // line 62
                echo "        </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['code'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "D:\\www\\spk\\GitHub-SparkLee\\StudyPHP\\LaravelOctoberCms/themes/responsiv-flat/partials/nav.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 62,  122 => 59,  118 => 57,  116 => 56,  113 => 55,  109 => 54,  105 => 53,  99 => 51,  95 => 50,  91 => 49,  83 => 47,  78 => 46,  67 => 45,  54 => 84,  48 => 81,  41 => 77,  29 => 67,  27 => 66,  24 => 65,  21 => 44,  19 => 2,);
    }
}
