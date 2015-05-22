<?php

/* D:\www\spk\GitHub-SparkLee\StudyPHP\LaravelOctoberCms/themes/demo/partials/explain/plugins.htm */
class __TwigTemplate_b6985e8eb61e7ee608cd454fc232d220f4d02ab093c38e35fd6b47b4f23dc30d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '__internal_efbcbcf61a7c71d26b818ac60567287bf321dfccbd755513f8b91e72d504f4b5' => array($this, 'block___internal_efbcbcf61a7c71d26b818ac60567287bf321dfccbd755513f8b91e72d504f4b5'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<hr />

<p class=\"lead\">
    <i class=\"icon-copy\"></i> &nbsp; The HTML markup for this example:
</p>
<pre>
";
        // line 7
        echo twig_escape_filter($this->env, (string) $this->renderBlock("__internal_efbcbcf61a7c71d26b818ac60567287bf321dfccbd755513f8b91e72d504f4b5", $context, $blocks));
        // line 9
        echo "</pre>

<hr />

<p class=\"lead\">
    <i class=\"icon-question\"></i> &nbsp; Wait, only one line is needed?
</p>
<p><em>Yes!</em> unlike the <a href=\"";
        // line 16
        echo $this->env->getExtension('CMS')->pageFilter("ajax");
        echo "\">AJAX example</a>, components are simple building blocks that can be used with a small amount of code.</p>
<p>The <code>demoTodo</code> component used here is provided by the plugin called <strong>October\\Demo</strong>, you can find it in the <code>plugins/october/demo</code> folder.</p>";
    }

    // line 7
    public function block___internal_efbcbcf61a7c71d26b818ac60567287bf321dfccbd755513f8b91e72d504f4b5($context, array $blocks = array())
    {
        // line 8
        echo "{% component 'demoTodo' %}";
        echo "
";
    }

    public function getTemplateName()
    {
        return "D:\\www\\spk\\GitHub-SparkLee\\StudyPHP\\LaravelOctoberCms/themes/demo/partials/explain/plugins.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 8,  45 => 7,  39 => 16,  30 => 9,  28 => 7,  20 => 1,);
    }
}
