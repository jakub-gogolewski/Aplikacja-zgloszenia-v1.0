<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* main/index.html.twig */
class __TwigTemplate_25d5a6e070781fb46ff128dc7be9c150 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "main/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>Lista użytkowników</h1>
    <ul>
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 6, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 7
            echo "            <li>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "Id", [], "any", false, false, false, 7), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "Imie", [], "any", false, false, false, 7), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "Nazwisko", [], "any", false, false, false, 7), "html", null, true);
            echo " | ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "getEmail", [], "any", false, false, false, 7), "html", null, true);
            echo " | ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IsVerified", [], "any", false, false, false, 7), "html", null, true);
            echo "
            <button class=\"delete-btn\" data-user-id=\"";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "Id", [], "any", false, false, false, 8), "html", null, true);
            echo "\">Usuń</button>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </ul>
    <script>
    \$(document).on('click', '.delete-btn', function() {
        let userId = \$(this).data('user-id');
        \$.ajax({
            url: `/user/delete/\${userId}`,
            method: 'POST',
            success: function() {
                alert('Użytkownik został usunięty');
                location.reload(); // Odśwież stronę, aby zaktualizować listę
            },
            error: function(jqXHR) {
    let errorMessage = 'Błąd podczas usuwania użytkownika';
    if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
        errorMessage = jqXHR.responseJSON.message;
    }
    alert(errorMessage);
}
        });
    });
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "main/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 11,  89 => 8,  76 => 7,  72 => 6,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
    <h1>Lista użytkowników</h1>
    <ul>
        {% for user in users %}
            <li>{{ user.Id }} {{ user.Imie }} {{ user.Nazwisko }} | {{ user.getEmail }} | {{ user.IsVerified }}
            <button class=\"delete-btn\" data-user-id=\"{{ user.Id }}\">Usuń</button>
            </li>
        {% endfor %}
    </ul>
    <script>
    \$(document).on('click', '.delete-btn', function() {
        let userId = \$(this).data('user-id');
        \$.ajax({
            url: `/user/delete/\${userId}`,
            method: 'POST',
            success: function() {
                alert('Użytkownik został usunięty');
                location.reload(); // Odśwież stronę, aby zaktualizować listę
            },
            error: function(jqXHR) {
    let errorMessage = 'Błąd podczas usuwania użytkownika';
    if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
        errorMessage = jqXHR.responseJSON.message;
    }
    alert(errorMessage);
}
        });
    });
</script>
{% endblock %}


", "main/index.html.twig", "C:\\Users\\GogolTech\\Desktop\\duzy_projekt_programowanie\\templates\\main\\index.html.twig");
    }
}
