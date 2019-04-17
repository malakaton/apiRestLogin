<?php

/* SensioDistributionBundle::Configurator/layout.html.twig */
class __TwigTemplate_cb689937bb87e4302c9f96486e249044f9e67e42799dcaf8ff2874af33832912 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "SensioDistributionBundle::Configurator/layout.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_73d5a095d1c0f721f6ee0f3423aad0ee403155aac51369ff9eb4b5e85d0f0055 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_73d5a095d1c0f721f6ee0f3423aad0ee403155aac51369ff9eb4b5e85d0f0055->enter($__internal_73d5a095d1c0f721f6ee0f3423aad0ee403155aac51369ff9eb4b5e85d0f0055_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SensioDistributionBundle::Configurator/layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_73d5a095d1c0f721f6ee0f3423aad0ee403155aac51369ff9eb4b5e85d0f0055->leave($__internal_73d5a095d1c0f721f6ee0f3423aad0ee403155aac51369ff9eb4b5e85d0f0055_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_38c6d2d91b8cedce3f7d3ceedc067415a6620c2675f8c685323db42a1fc87210 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_38c6d2d91b8cedce3f7d3ceedc067415a6620c2675f8c685323db42a1fc87210->enter($__internal_38c6d2d91b8cedce3f7d3ceedc067415a6620c2675f8c685323db42a1fc87210_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/sensiodistribution/webconfigurator/css/configurator.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_38c6d2d91b8cedce3f7d3ceedc067415a6620c2675f8c685323db42a1fc87210->leave($__internal_38c6d2d91b8cedce3f7d3ceedc067415a6620c2675f8c685323db42a1fc87210_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_ea128022e193fa900ece8b1ee7b91e8dd8c0ad488ce2d182086356d826c958a3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ea128022e193fa900ece8b1ee7b91e8dd8c0ad488ce2d182086356d826c958a3->enter($__internal_ea128022e193fa900ece8b1ee7b91e8dd8c0ad488ce2d182086356d826c958a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Web Configurator Bundle";
        
        $__internal_ea128022e193fa900ece8b1ee7b91e8dd8c0ad488ce2d182086356d826c958a3->leave($__internal_ea128022e193fa900ece8b1ee7b91e8dd8c0ad488ce2d182086356d826c958a3_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_e12c72139b3e8b295da994ac9d12e63b6c8bfbdc0072075cd5526edaa3bd605d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e12c72139b3e8b295da994ac9d12e63b6c8bfbdc0072075cd5526edaa3bd605d->enter($__internal_e12c72139b3e8b295da994ac9d12e63b6c8bfbdc0072075cd5526edaa3bd605d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 10
        echo "    <div class=\"block\">
        ";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "    </div>
    <div class=\"version\">Symfony Standard Edition v.";
        // line 13
        echo twig_escape_filter($this->env, ($context["version"] ?? $this->getContext($context, "version")), "html", null, true);
        echo "</div>
";
        
        $__internal_e12c72139b3e8b295da994ac9d12e63b6c8bfbdc0072075cd5526edaa3bd605d->leave($__internal_e12c72139b3e8b295da994ac9d12e63b6c8bfbdc0072075cd5526edaa3bd605d_prof);

    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        $__internal_b1826592cee3ff194f6a7ff556fd368d4b3fd1bda65981cb6c2818d54bca3ba3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b1826592cee3ff194f6a7ff556fd368d4b3fd1bda65981cb6c2818d54bca3ba3->enter($__internal_b1826592cee3ff194f6a7ff556fd368d4b3fd1bda65981cb6c2818d54bca3ba3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_b1826592cee3ff194f6a7ff556fd368d4b3fd1bda65981cb6c2818d54bca3ba3->leave($__internal_b1826592cee3ff194f6a7ff556fd368d4b3fd1bda65981cb6c2818d54bca3ba3_prof);

    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 11,  79 => 13,  76 => 12,  74 => 11,  71 => 10,  65 => 9,  53 => 7,  43 => 4,  37 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"TwigBundle::layout.html.twig\" %}

{% block head %}
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/sensiodistribution/webconfigurator/css/configurator.css') }}\" />
{% endblock %}

{% block title 'Web Configurator Bundle' %}

{% block body %}
    <div class=\"block\">
        {% block content %}{% endblock %}
    </div>
    <div class=\"version\">Symfony Standard Edition v.{{ version }}</div>
{% endblock %}
", "SensioDistributionBundle::Configurator/layout.html.twig", "/home/malakaton/phpProjects/apiRestLogin/vendor/sensio/distribution-bundle/Sensio/Bundle/DistributionBundle/Resources/views/Configurator/layout.html.twig");
    }
}
