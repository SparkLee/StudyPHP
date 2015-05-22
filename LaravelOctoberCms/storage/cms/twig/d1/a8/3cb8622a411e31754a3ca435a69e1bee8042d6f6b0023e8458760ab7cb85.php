<?php

/* D:\www\spk\GitHub-SparkLee\StudyPHP\LaravelOctoberCms/themes/responsiv-flat/pages/samples/register.htm */
class __TwigTemplate_d1a83cb8622a411e31754a3ca435a69e1bee8042d6f6b0023e8458760ab7cb85 extends Twig_Template
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
        echo "<div class=\"signin-container\">
    <div class=\"container\">

        <div class=\"row\">
            <div class=\"col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1\">
                <div class=\"signin\">
                    <div class=\"signin-screen\">
                        <div class=\"signin-icon\">
                            <img src=\"";
        // line 9
        echo $this->env->getExtension('CMS')->themeFilter("assets/images/logo.png");
        echo "\" alt=\"Welcome to Flat App\" />
                            <h4>Sign up to <small>Flat App</small></h4>
                        </div>

                        <div class=\"signin-form\">
                            <div class=\"form-group\">
                                <input
                                    type=\"text\"
                                    class=\"form-control signin-field\"
                                    value=\"\"
                                    placeholder=\"Enter your name\"
                                    id=\"signin-name\" />
                                <label class=\"signin-field-icon fui-user\" for=\"signin-name\"></label>
                            </div>

                            <div class=\"form-group\">
                                <input
                                    type=\"text\"
                                    class=\"form-control signin-field\"
                                    value=\"\"
                                    placeholder=\"Enter your email\"
                                    id=\"signin-email\" />
                                <label class=\"signin-field-icon fui-mail\" for=\"signin-email\"></label>
                            </div>

                            <div class=\"form-group\">
                                <input
                                    type=\"password\"
                                    class=\"form-control signin-field\"
                                    value=\"\"
                                    placeholder=\"Password\"
                                    id=\"signin-pass\" />
                                <label class=\"signin-field-icon fui-lock\" for=\"signin-pass\"></label>
                            </div>

                            <a class=\"btn btn-primary btn-lg btn-block\" href=\"#\">Register</a>

                            <a class=\"signin-link\" href=\"";
        // line 46
        echo $this->env->getExtension('CMS')->pageFilter("samples/signin");
        echo "\">Already have an account?</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "D:\\www\\spk\\GitHub-SparkLee\\StudyPHP\\LaravelOctoberCms/themes/responsiv-flat/pages/samples/register.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 46,  29 => 9,  19 => 1,);
    }
}
