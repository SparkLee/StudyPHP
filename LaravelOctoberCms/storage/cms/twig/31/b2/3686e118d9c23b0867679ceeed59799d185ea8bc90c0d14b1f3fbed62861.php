<?php

/* D:\www\spk\GitHub-SparkLee\StudyPHP\LaravelOctoberCms/themes/demo/partials/explain/ajax.htm */
class __TwigTemplate_31b23686e118d9c23b0867679ceeed59799d185ea8bc90c0d14b1f3fbed62861 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '__internal_614788953948c7fbb588eb789d574d2abd876fa5212223d0df5b7bc9ca46d64e' => array($this, 'block___internal_614788953948c7fbb588eb789d574d2abd876fa5212223d0df5b7bc9ca46d64e'),
            '__internal_b4e90b48b56809219be0b3ed401925c62d10436012fafe9b2b3d32df72def3bc' => array($this, 'block___internal_b4e90b48b56809219be0b3ed401925c62d10436012fafe9b2b3d32df72def3bc'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<hr />

<!-- This file is an explanation of the AJAX page -->

<p class=\"lead\">
    <i class=\"icon-copy\"></i> &nbsp; The HTML markup for this example:
</p>

<pre>";
        // line 9
        echo twig_escape_filter($this->env, (string) $this->renderBlock("__internal_614788953948c7fbb588eb789d574d2abd876fa5212223d0df5b7bc9ca46d64e", $context, $blocks));
        // line 24
        echo "</pre>

<hr />

<p class=\"lead\">
    <i class=\"icon-tags\"></i> &nbsp; The <code>calcresult</code> partial:
</p>

<pre>";
        // line 32
        echo twig_escape_filter($this->env, (string) $this->renderBlock("__internal_b4e90b48b56809219be0b3ed401925c62d10436012fafe9b2b3d32df72def3bc", $context, $blocks));
        // line 37
        echo "</pre>

<hr />

<p class=\"lead\">
    <i class=\"icon-code\"></i> &nbsp; The <code>onTest</code> PHP code:
</p>

<pre>function onTest()
{
    \$value1 = post('value1');
    \$value2 = post('value2');
    \$operation = post('operation');

    switch (\$operation) {
        case '+' : 
            \$this['result'] = \$value1 + \$value2;
            break;
        case '-' : 
            \$this['result'] = \$value1 - \$value2;
            break;
        case '*' : 
            \$this['result'] = \$value1 * \$value2;
            break;
        default : 
            \$this['result'] = \$value1 / \$value2;
            break;
    }
}</pre>";
    }

    // line 9
    public function block___internal_614788953948c7fbb588eb789d574d2abd876fa5212223d0df5b7bc9ca46d64e($context, array $blocks = array())
    {
        echo "<!-- The form -->
<form data-request=\"onTest\" data-request-update=\"calcresult: '#result'\">
    <input type=\"text\" value=\"15\" name=\"value1\">
    <select name=\"operation\">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select>
    <input type=\"text\" value=\"5\" name=\"value2\">
    <button type=\"submit\">Calculate</button>
</form>

<!-- The result -->
<div id=\"result\">";
        // line 23
        echo "{% partial \"calcresult\" %}";
        echo "</div>
";
    }

    // line 32
    public function block___internal_b4e90b48b56809219be0b3ed401925c62d10436012fafe9b2b3d32df72def3bc($context, array $blocks = array())
    {
        // line 33
        echo "{% if result %}";
        echo "
    The result is ";
        // line 34
        echo "{{ result }}";
        echo ".
";
        // line 35
        echo "{% else %}";
        echo "
    Click the <em>Calculate</em> button to find the answer.
";
        // line 37
        echo "{% endif %}";
    }

    public function getTemplateName()
    {
        return "D:\\www\\spk\\GitHub-SparkLee\\StudyPHP\\LaravelOctoberCms/themes/demo/partials/explain/ajax.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 37,  112 => 35,  108 => 34,  104 => 33,  101 => 32,  95 => 23,  77 => 9,  45 => 37,  43 => 32,  33 => 24,  31 => 9,  21 => 1,);
    }
}
