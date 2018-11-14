<?php

/* layouts/partials/_nav.twig */
class __TwigTemplate_68eda85319f192a250b6d6a289f45eae98245520ac6ca5985859b099fb6b758e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<nav class=\"navbar\" role=\"navigation\" aria-label=\"main navigation\">
  <div class=\"container\">
    <div class=\"navbar-brand\">
      <a class=\"navbar-item is-size-5\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->baseUrl(), "html", null, true);
        echo "\">
        ";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['App\TwigExtensions\Helpers']->getEnv("APP_NAME"), "html", null, true);
        echo "
      </a>

      <a role=\"button\" class=\"navbar-burger burger\" aria-label=\"menu\" aria-expanded=\"false\" data-target=\"navbarBasicExample\">
        <span aria-hidden=\"true\"></span>
        <span aria-hidden=\"true\"></span>
        <span aria-hidden=\"true\"></span>
      </a>
    </div>

    <div id=\"navbarBasicExample\" class=\"navbar-menu\">
      <div class=\"navbar-start\"></div>

      <div class=\"navbar-end\">
        <a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Slim\Views\TwigExtension']->pathFor("home"), "html", null, true);
        echo "\" class=\"navbar-item\">
          Home
        </a>
      </div>
    </div>
  </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "layouts/partials/_nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 19,  32 => 5,  28 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layouts/partials/_nav.twig", "C:\\wamp64\\www\\slim\\resources\\views\\layouts\\partials\\_nav.twig");
    }
}
