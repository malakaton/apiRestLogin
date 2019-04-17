<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_a08dadbe6d41ca92323cce49ccf6c761db2955d7a1a1b64e68ea311f2d3c5bea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ee31b3ef549b79010d9f65f9dba1fde132fb14d0f6bd27e565d86ff812f22bd0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ee31b3ef549b79010d9f65f9dba1fde132fb14d0f6bd27e565d86ff812f22bd0->enter($__internal_ee31b3ef549b79010d9f65f9dba1fde132fb14d0f6bd27e565d86ff812f22bd0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ee31b3ef549b79010d9f65f9dba1fde132fb14d0f6bd27e565d86ff812f22bd0->leave($__internal_ee31b3ef549b79010d9f65f9dba1fde132fb14d0f6bd27e565d86ff812f22bd0_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_44970df47e30beec042af9ef37a6a8308140c914431cbeeaf5d19c5c9ff0fece = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_44970df47e30beec042af9ef37a6a8308140c914431cbeeaf5d19c5c9ff0fece->enter($__internal_44970df47e30beec042af9ef37a6a8308140c914431cbeeaf5d19c5c9ff0fece_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_44970df47e30beec042af9ef37a6a8308140c914431cbeeaf5d19c5c9ff0fece->leave($__internal_44970df47e30beec042af9ef37a6a8308140c914431cbeeaf5d19c5c9ff0fece_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_c1f32845c2285dc89f62fa51379e57c0fb31a018fb075dfaa9d3dceaf7a05dae = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c1f32845c2285dc89f62fa51379e57c0fb31a018fb075dfaa9d3dceaf7a05dae->enter($__internal_c1f32845c2285dc89f62fa51379e57c0fb31a018fb075dfaa9d3dceaf7a05dae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["status_code"] ?? $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["status_text"] ?? $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_c1f32845c2285dc89f62fa51379e57c0fb31a018fb075dfaa9d3dceaf7a05dae->leave($__internal_c1f32845c2285dc89f62fa51379e57c0fb31a018fb075dfaa9d3dceaf7a05dae_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_27bbc3b493c3e4a0ceac7fe5a94156bf8f6c23c212813450a28e62d55c6a1710 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_27bbc3b493c3e4a0ceac7fe5a94156bf8f6c23c212813450a28e62d55c6a1710->enter($__internal_27bbc3b493c3e4a0ceac7fe5a94156bf8f6c23c212813450a28e62d55c6a1710_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_27bbc3b493c3e4a0ceac7fe5a94156bf8f6c23c212813450a28e62d55c6a1710->leave($__internal_27bbc3b493c3e4a0ceac7fe5a94156bf8f6c23c212813450a28e62d55c6a1710_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'TwigBundle::layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include 'TwigBundle:Exception:exception.html.twig' %}
{% endblock %}
", "TwigBundle:Exception:exception_full.html.twig", "/home/malakaton/phpProjects/apiRestLogin/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}
