<?php

/* layouts/app.twig */
class __TwigTemplate_1729b252c4f7b5502c0b64aebf222f914e584e19b555e24ca3c3c19e4a21f0ad extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

\t\t<link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/css/app.css\">
\t</head>
\t<body>
\t\t";
        // line 10
        $this->loadTemplate("layouts/partials/_nav.twig", "layouts/app.twig", 10)->display($context);
        // line 11
        echo "\t\t
\t\t<div class=\"container\">
\t\t\t<section id=\"app\" class=\"section\">
\t\t\t\t";
        // line 14
        $this->displayBlock('content', $context, $blocks);
        // line 15
        echo "\t\t\t</section>
\t\t</div>

\t\t<script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "/js/app.js\"></script>
\t</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/app.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 14,  63 => 5,  56 => 18,  51 => 15,  49 => 14,  44 => 11,  42 => 10,  36 => 7,  31 => 5,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layouts/app.twig", "C:\\wamp64\\www\\slim\\resources\\views\\layouts\\app.twig");
    }
}
