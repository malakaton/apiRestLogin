<?php

/* base.html.twig */
class __TwigTemplate_adb164b8fb4402168fdb5fe814355a9aa396f15086b5902348d0cf7c6bcbb831 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cd35f99a6bb582411c6ff74c88004004ab66e46be112243c29298e66308b1fd5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cd35f99a6bb582411c6ff74c88004004ab66e46be112243c29298e66308b1fd5->enter($__internal_cd35f99a6bb582411c6ff74c88004004ab66e46be112243c29298e66308b1fd5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_cd35f99a6bb582411c6ff74c88004004ab66e46be112243c29298e66308b1fd5->leave($__internal_cd35f99a6bb582411c6ff74c88004004ab66e46be112243c29298e66308b1fd5_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_82bfa0dd66fca38d06ae2efbb54956698ce3d4460ad494eb4035fdbb4f287bb2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_82bfa0dd66fca38d06ae2efbb54956698ce3d4460ad494eb4035fdbb4f287bb2->enter($__internal_82bfa0dd66fca38d06ae2efbb54956698ce3d4460ad494eb4035fdbb4f287bb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_82bfa0dd66fca38d06ae2efbb54956698ce3d4460ad494eb4035fdbb4f287bb2->leave($__internal_82bfa0dd66fca38d06ae2efbb54956698ce3d4460ad494eb4035fdbb4f287bb2_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_f15981b34d95d883ad39ad5aa539088c87fc06d29f6548e1e131d7ab3fbcde81 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f15981b34d95d883ad39ad5aa539088c87fc06d29f6548e1e131d7ab3fbcde81->enter($__internal_f15981b34d95d883ad39ad5aa539088c87fc06d29f6548e1e131d7ab3fbcde81_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_f15981b34d95d883ad39ad5aa539088c87fc06d29f6548e1e131d7ab3fbcde81->leave($__internal_f15981b34d95d883ad39ad5aa539088c87fc06d29f6548e1e131d7ab3fbcde81_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_bc6b13a45c92f4e60edbc1e69180bec1e7282227a0b06cae4872530f82eae8ee = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bc6b13a45c92f4e60edbc1e69180bec1e7282227a0b06cae4872530f82eae8ee->enter($__internal_bc6b13a45c92f4e60edbc1e69180bec1e7282227a0b06cae4872530f82eae8ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_bc6b13a45c92f4e60edbc1e69180bec1e7282227a0b06cae4872530f82eae8ee->leave($__internal_bc6b13a45c92f4e60edbc1e69180bec1e7282227a0b06cae4872530f82eae8ee_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_17905357fd5e7d83156abae253398d809534526b110271421730fd6dee7af76c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_17905357fd5e7d83156abae253398d809534526b110271421730fd6dee7af76c->enter($__internal_17905357fd5e7d83156abae253398d809534526b110271421730fd6dee7af76c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_17905357fd5e7d83156abae253398d809534526b110271421730fd6dee7af76c->leave($__internal_17905357fd5e7d83156abae253398d809534526b110271421730fd6dee7af76c_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/home/malakaton/phpProjects/apiRestLogin/app/Resources/views/base.html.twig");
    }
}
