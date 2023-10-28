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

/* security/login.html.twig */
class __TwigTemplate_c93988033006bda1c7b063b9a75bc071 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        // line 1
        echo "<head>

<link rel=\"stylesheet\" href=\"./dist/css/login.css\">
<link rel=\"stylesheet\" href=\"./plugins/fontawesome-free/css/all.css\">

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js\"></script>






</head>

<body>

<!-- particles.js container -->
<div id=\"particles-js\"></div>

<!-- scripts do particle-->
<script src=\"./dist/js/particles.js\"></script>
<script src=\"./dist/js/app.js\"></script>

<div class=\"container ";
        // line 25
        if ((((array_key_exists("destination", $context)) ? (_twig_default_filter((isset($context["destination"]) || array_key_exists("destination", $context) ? $context["destination"] : (function () { throw new RuntimeError('Variable "destination" does not exist.', 25, $this->source); })()), "")) : ("")) == "/register")) {
            echo " right-panel-active noanimation ";
        }
        echo "\" id=\"container\">
\t<div class=\"form-container sign-up-container\">
\t\t<form method=\"post\" action=\"/register\">
";
        // line 28
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 28, $this->source); })()), 'form_start');
        echo "
\t\t\t<h1>Zarejestruj się</h1><br>
<div class=\"input-group mb-3\">

        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\"><i class=\"fas fa-user-astronaut\"></i></span>
        </div>

        ";
        // line 36
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 36, $this->source); })()), "name", [], "any", false, false, false, 36), 'widget');
        echo "
        ";
        // line 37
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 37, $this->source); })()), "name", [], "any", false, false, false, 37), "vars", [], "any", false, false, false, 37), "errors", [], "any", false, false, false, 37)) > 0)) {
            // line 38
            echo "        <div>
            <small class=\"form-error\">";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 39, $this->source); })()), "name", [], "any", false, false, false, 39), "vars", [], "any", false, false, false, 39), "errors", [], "any", false, false, false, 39)), "message", [], "any", false, false, false, 39), "html", null, true);
            echo "</small>
        </div>
        ";
        }
        // line 42
        echo "    </div>

    <div class=\"input-group mb-3\">
        <div class=\"input-group-prepend\">
        <span class=\"input-group-text\"><i class=\"fas fa-user-astronaut\"></i></span>
        </div>
        
        ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 49, $this->source); })()), "lastname", [], "any", false, false, false, 49), 'widget');
        echo "

        ";
        // line 51
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 51, $this->source); })()), "lastname", [], "any", false, false, false, 51), "vars", [], "any", false, false, false, 51), "errors", [], "any", false, false, false, 51)) > 0)) {
            // line 52
            echo "        <div>
            <small class=\"form-error\">";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 53, $this->source); })()), "lastname", [], "any", false, false, false, 53), "vars", [], "any", false, false, false, 53), "errors", [], "any", false, false, false, 53)), "message", [], "any", false, false, false, 53), "html", null, true);
            echo "</small>
        </div>
        ";
        }
        // line 56
        echo "    </div>

<div class=\"input-group mb-3\">
        <div class=\"input-group-prepend\">
        <span class=\"input-group-text\"><i class=\"fas fa-envelope\"></i></span>
        
        </div>

        ";
        // line 64
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 64, $this->source); })()), "email", [], "any", false, false, false, 64), 'widget');
        echo "
        ";
        // line 65
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 65, $this->source); })()), "email", [], "any", false, false, false, 65), "vars", [], "any", false, false, false, 65), "errors", [], "any", false, false, false, 65)) > 0)) {
            // line 66
            echo "        <div>
            <small class=\"form-error\">";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 67, $this->source); })()), "email", [], "any", false, false, false, 67), "vars", [], "any", false, false, false, 67), "errors", [], "any", false, false, false, 67)), "message", [], "any", false, false, false, 67), "html", null, true);
            echo "</small>
        </div>
        ";
        }
        // line 70
        echo "    </div>


<div class=\"input-group mb-3\">
    <div class=\"input-group-prepend\">
    <span class=\"input-group-text\"><i class=\"fas fa-lock\"></i></span>
    </div>
        
    ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 78, $this->source); })()), "plainPassword", [], "any", false, false, false, 78), 'widget');
        echo "
    <div>
    ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 80, $this->source); })()), "plainPassword", [], "any", false, false, false, 80), "vars", [], "any", false, false, false, 80), "errors", [], "any", false, false, false, 80));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 81
            echo "        <small class=\"form-error\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 81), "html", null, true);
            echo "</small>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "    </div>
</div>

<div class=\"input-group mb-3\">
    ";
        // line 87
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 87, $this->source); })()), "agreeTerms", [], "any", false, false, false, 87), 'widget');
        echo "
    <label for=\"registration_form_agreeTerms\">Akceptuję regulamin</label>
</div><br>

<button type=\"submit\">ZAREJESTRUJ SIĘ</button>
";
        // line 92
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 92, $this->source); })()), 'form_end');
        echo "
\t\t</form>
\t</div>

\t<div class=\"form-container sign-in-container\">
\t\t<form method=\"post\" action=\"/login\">
            ";
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 98, $this->source); })()), "flashes", ["verify_error"], "method", false, false, false, 98));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 99
            echo "        <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, $context["flash_error"], "html", null, true);
            echo "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 101, $this->source); })()), "flashes", ["notice"], "method", false, false, false, 101));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 102
            echo "    <div class=\"alert alert-success\">
        ";
            // line 103
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 106
        echo "\t\t\t<h1>Zaloguj się</h1><br>
\t\t\t<div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\"><i class=\"fas fa-envelope\"></i></span>
                  </div>
                  <input type=\"email\" name=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Email\">
                </div>
      <div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\"><i class=\"fas fa-lock\"></i></span>
                  </div>
                  <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Hasło\">
                </div>
                 <input type=\"hidden\" name=\"_csrf_token\"
           value=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\"
    >
\t\t\t<a href=\"#\">Zapomniałeś hasła?</a>
\t\t\t<button type=\"submit\">ZALOGUJ</button>
\t\t</form>
\t</div>
\t<div class=\"overlay-container\">
\t\t<div class=\"overlay\">
\t\t\t<div class=\"overlay-panel overlay-left\">
      <a href=\"/login\" class=\"navbar-brand logo\">
    <svg version=\"1.0\" xmlns=\"http://www.w3.org/2000/svg\"
    viewBox=\"0 0 508.000000 131.000000\"
    preserveAspectRatio=\"xMidYMid meet\">
    <g transform=\"translate(0.000000,131.000000) scale(0.100000,-0.100000)\"
    fill=\"currentColor\" stroke=\"none\">
    <path d=\"M575 1273 c-220 -27 -254 -51 -322 -228 l-38 -100 -74 -5 c-61 -4
    -76 -9 -92 -29 -21 -26 -24 -62 -9 -92 12 -22 60 -49 88 -49 17 0 17 -4 -7
    -72 -26 -72 -26 -78 -26 -346 l0 -274 33 -29 c81 -73 182 -10 182 114 l0 27
    493 -2 492 -3 3 -35 c7 -92 39 -130 108 -130 34 0 48 6 73 31 l31 31 -1 256
    c0 259 -3 282 -44 409 -6 18 -2 22 27 28 50 11 78 42 78 85 0 55 -27 74 -112
    80 l-70 5 -43 110 c-35 90 -51 117 -86 147 -46 42 -76 52 -199 68 -78 9 -416
    12 -485 3z m623 -190 c24 -21 107 -246 99 -268 -6 -13 -64 -15 -489 -15 -271
    0 -489 4 -497 9 -12 8 -7 30 30 133 24 67 52 131 62 140 16 17 47 18 396 18
    346 0 381 -1 399 -17z m-859 -478 c75 -38 43 -155 -42 -155 -87 0 -113 128
    -32 160 29 13 43 12 74 -5z m1029 -21 c70 -79 -51 -185 -123 -108 -35 37 -33
    78 5 116 26 25 36 29 63 24 18 -3 42 -17 55 -32z\"/>
    <path d=\"M1775 375 l0 -225 212 0 212 0 6 47 c3 27 8 56 10 66 3 18 -5 19
    -143 15 l-147 -3 -3 163 -2 162 -73 0 -72 0 0 -225z\"/>
    <path d=\"M2260 376 l0 -226 165 0 c185 0 252 11 295 46 31 27 47 77 35 114 -9
    28 -62 60 -100 60 l-30 1 37 19 c47 25 68 56 68 98 0 91 -36 105 -277 110
    l-193 4 0 -226z m311 104 c23 -13 25 -36 3 -44 -9 -3 -51 -6 -95 -6 l-79 0 0
    30 0 30 76 0 c41 0 84 -5 95 -10z m3 -160 c14 -5 26 -16 26 -24 0 -26 -35 -36
    -119 -36 l-81 0 0 35 0 35 74 0 c41 0 86 -4 100 -10z\"/>
    <path d=\"M2923 593 c-24 -5 -63 -47 -63 -68 0 -23 31 -39 92 -46 65 -8 80 -15
    58 -30 -14 -9 -50 -6 -106 7 -15 4 -23 -2 -32 -20 -11 -24 -9 -26 26 -36 63
    -17 136 -13 166 11 30 24 34 59 9 81 -10 9 -44 18 -75 20 -63 5 -81 14 -58 29
    16 10 84 3 112 -12 16 -9 28 6 28 36 0 23 -96 40 -157 28z\"/>
    <path d=\"M3173 585 c-39 -17 -53 -42 -53 -94 0 -28 7 -48 24 -68 22 -26 30
    -28 96 -28 66 0 74 2 96 28 26 31 33 92 13 129 -23 43 -114 60 -176 33z m115
    -57 c36 -36 -12 -97 -65 -83 -31 8 -43 21 -43 51 0 30 19 44 60 44 20 0 41 -5
    48 -12z\"/>
    <path d=\"M4353 585 c-39 -17 -53 -42 -53 -94 0 -28 7 -48 24 -67 20 -24 33
    -28 88 -32 58 -4 67 -2 96 23 27 23 32 33 32 72 0 57 -14 81 -55 99 -43 18
    -90 17 -132 -1z m120 -66 c18 -28 0 -67 -33 -74 -58 -13 -105 46 -68 83 18 18
    89 11 101 -9z\"/>
    <path d=\"M4885 589 c-83 -24 -69 -109 18 -109 50 0 87 -9 87 -21 0 -16 -47
    -21 -91 -9 -38 10 -44 10 -56 -6 -19 -26 -17 -31 18 -43 55 -19 143 -14 173
    10 51 40 20 99 -54 99 -44 0 -80 10 -80 21 0 17 46 20 92 6 41 -13 47 -13 52
    0 12 31 5 41 -38 52 -52 13 -79 13 -121 0z\"/>
    <path d=\"M3390 490 l0 -100 95 0 95 0 0 31 0 31 -62 -3 -63 -4 -3 73 -3 72
    -29 0 -30 0 0 -100z\"/>
    <path d=\"M3600 515 c0 -68 3 -79 26 -102 23 -23 31 -25 90 -21 91 6 107 24
    112 123 l4 75 -35 0 -36 0 -3 -66 c-3 -77 -18 -95 -65 -78 -26 9 -28 13 -31
    77 -3 67 -3 67 -32 67 l-30 0 0 -75z\"/>
    <path d=\"M3850 565 c0 -23 4 -25 45 -25 l45 0 0 -75 0 -75 30 0 29 0 3 73 3
    72 43 3 c37 3 42 6 42 28 l0 24 -120 0 -120 0 0 -25z\"/>
    <path d=\"M4110 565 c0 -20 5 -25 25 -25 23 0 25 -3 25 -50 0 -47 -2 -50 -25
    -50 -20 0 -25 -5 -25 -25 0 -25 1 -25 80 -25 78 0 80 1 80 24 0 18 -6 25 -22
    28 -20 3 -23 10 -26 51 -3 45 -2 47 22 47 21 0 26 5 26 25 0 25 -1 25 -80 25
    -79 0 -80 0 -80 -25z\"/>
    <path d=\"M4570 491 l0 -101 33 0 33 0 -4 59 c-6 90 2 93 38 14 l33 -73 48 0
    49 0 0 100 0 100 -30 0 -30 0 0 -72 c0 -82 -7 -81 -43 7 l-25 60 -51 3 -51 3
    0 -100z\"/>
    </g>
    </svg>
</a>
\t\t\t\t<h1>Masz już konto?</h1>
\t\t\t\t<p>Kliknij tutaj i zaloguj się!</p>
\t\t\t\t<button class=\"ghost\" id=\"signIn\">LOGOWANIE</button>
\t\t\t</div>
\t\t\t<div class=\"overlay-panel overlay-right\">
      <a href=\"/login\" class=\"navbar-brand logo\">
    <svg version=\"1.0\" xmlns=\"http://www.w3.org/2000/svg\"
    viewBox=\"0 0 508.000000 131.000000\"
    preserveAspectRatio=\"xMidYMid meet\">
    <g transform=\"translate(0.000000,131.000000) scale(0.100000,-0.100000)\"
    fill=\"currentColor\" stroke=\"none\">
    <path d=\"M575 1273 c-220 -27 -254 -51 -322 -228 l-38 -100 -74 -5 c-61 -4
    -76 -9 -92 -29 -21 -26 -24 -62 -9 -92 12 -22 60 -49 88 -49 17 0 17 -4 -7
    -72 -26 -72 -26 -78 -26 -346 l0 -274 33 -29 c81 -73 182 -10 182 114 l0 27
    493 -2 492 -3 3 -35 c7 -92 39 -130 108 -130 34 0 48 6 73 31 l31 31 -1 256
    c0 259 -3 282 -44 409 -6 18 -2 22 27 28 50 11 78 42 78 85 0 55 -27 74 -112
    80 l-70 5 -43 110 c-35 90 -51 117 -86 147 -46 42 -76 52 -199 68 -78 9 -416
    12 -485 3z m623 -190 c24 -21 107 -246 99 -268 -6 -13 -64 -15 -489 -15 -271
    0 -489 4 -497 9 -12 8 -7 30 30 133 24 67 52 131 62 140 16 17 47 18 396 18
    346 0 381 -1 399 -17z m-859 -478 c75 -38 43 -155 -42 -155 -87 0 -113 128
    -32 160 29 13 43 12 74 -5z m1029 -21 c70 -79 -51 -185 -123 -108 -35 37 -33
    78 5 116 26 25 36 29 63 24 18 -3 42 -17 55 -32z\"/>
    <path d=\"M1775 375 l0 -225 212 0 212 0 6 47 c3 27 8 56 10 66 3 18 -5 19
    -143 15 l-147 -3 -3 163 -2 162 -73 0 -72 0 0 -225z\"/>
    <path d=\"M2260 376 l0 -226 165 0 c185 0 252 11 295 46 31 27 47 77 35 114 -9
    28 -62 60 -100 60 l-30 1 37 19 c47 25 68 56 68 98 0 91 -36 105 -277 110
    l-193 4 0 -226z m311 104 c23 -13 25 -36 3 -44 -9 -3 -51 -6 -95 -6 l-79 0 0
    30 0 30 76 0 c41 0 84 -5 95 -10z m3 -160 c14 -5 26 -16 26 -24 0 -26 -35 -36
    -119 -36 l-81 0 0 35 0 35 74 0 c41 0 86 -4 100 -10z\"/>
    <path d=\"M2923 593 c-24 -5 -63 -47 -63 -68 0 -23 31 -39 92 -46 65 -8 80 -15
    58 -30 -14 -9 -50 -6 -106 7 -15 4 -23 -2 -32 -20 -11 -24 -9 -26 26 -36 63
    -17 136 -13 166 11 30 24 34 59 9 81 -10 9 -44 18 -75 20 -63 5 -81 14 -58 29
    16 10 84 3 112 -12 16 -9 28 6 28 36 0 23 -96 40 -157 28z\"/>
    <path d=\"M3173 585 c-39 -17 -53 -42 -53 -94 0 -28 7 -48 24 -68 22 -26 30
    -28 96 -28 66 0 74 2 96 28 26 31 33 92 13 129 -23 43 -114 60 -176 33z m115
    -57 c36 -36 -12 -97 -65 -83 -31 8 -43 21 -43 51 0 30 19 44 60 44 20 0 41 -5
    48 -12z\"/>
    <path d=\"M4353 585 c-39 -17 -53 -42 -53 -94 0 -28 7 -48 24 -67 20 -24 33
    -28 88 -32 58 -4 67 -2 96 23 27 23 32 33 32 72 0 57 -14 81 -55 99 -43 18
    -90 17 -132 -1z m120 -66 c18 -28 0 -67 -33 -74 -58 -13 -105 46 -68 83 18 18
    89 11 101 -9z\"/>
    <path d=\"M4885 589 c-83 -24 -69 -109 18 -109 50 0 87 -9 87 -21 0 -16 -47
    -21 -91 -9 -38 10 -44 10 -56 -6 -19 -26 -17 -31 18 -43 55 -19 143 -14 173
    10 51 40 20 99 -54 99 -44 0 -80 10 -80 21 0 17 46 20 92 6 41 -13 47 -13 52
    0 12 31 5 41 -38 52 -52 13 -79 13 -121 0z\"/>
    <path d=\"M3390 490 l0 -100 95 0 95 0 0 31 0 31 -62 -3 -63 -4 -3 73 -3 72
    -29 0 -30 0 0 -100z\"/>
    <path d=\"M3600 515 c0 -68 3 -79 26 -102 23 -23 31 -25 90 -21 91 6 107 24
    112 123 l4 75 -35 0 -36 0 -3 -66 c-3 -77 -18 -95 -65 -78 -26 9 -28 13 -31
    77 -3 67 -3 67 -32 67 l-30 0 0 -75z\"/>
    <path d=\"M3850 565 c0 -23 4 -25 45 -25 l45 0 0 -75 0 -75 30 0 29 0 3 73 3
    72 43 3 c37 3 42 6 42 28 l0 24 -120 0 -120 0 0 -25z\"/>
    <path d=\"M4110 565 c0 -20 5 -25 25 -25 23 0 25 -3 25 -50 0 -47 -2 -50 -25
    -50 -20 0 -25 -5 -25 -25 0 -25 1 -25 80 -25 78 0 80 1 80 24 0 18 -6 25 -22
    28 -20 3 -23 10 -26 51 -3 45 -2 47 22 47 21 0 26 5 26 25 0 25 -1 25 -80 25
    -79 0 -80 0 -80 -25z\"/>
    <path d=\"M4570 491 l0 -101 33 0 33 0 -4 59 c-6 90 2 93 38 14 l33 -73 48 0
    49 0 0 100 0 100 -30 0 -30 0 0 -72 c0 -82 -7 -81 -43 7 l-25 60 -51 3 -51 3
    0 -100z\"/>
    </g>
    </svg>
</a>
\t\t\t\t<h1>Nie masz konta?</h1>
\t\t\t\t<p>Kliknij tutaj i zarejestruj się!</p>
\t\t\t\t<button class=\"ghost\" id=\"signUp\">REJESTRACJA</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

<script type=text/javascript>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
\tcontainer.classList.add(\"right-panel-active\");
});

signInButton.addEventListener('click', () => {
\tcontainer.classList.remove(\"right-panel-active\");
});

</script>
</body>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 120,  234 => 106,  225 => 103,  222 => 102,  217 => 101,  208 => 99,  204 => 98,  195 => 92,  187 => 87,  181 => 83,  172 => 81,  168 => 80,  163 => 78,  153 => 70,  147 => 67,  144 => 66,  142 => 65,  138 => 64,  128 => 56,  122 => 53,  119 => 52,  117 => 51,  112 => 49,  103 => 42,  97 => 39,  94 => 38,  92 => 37,  88 => 36,  77 => 28,  69 => 25,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<head>

<link rel=\"stylesheet\" href=\"./dist/css/login.css\">
<link rel=\"stylesheet\" href=\"./plugins/fontawesome-free/css/all.css\">

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js\"></script>






</head>

<body>

<!-- particles.js container -->
<div id=\"particles-js\"></div>

<!-- scripts do particle-->
<script src=\"./dist/js/particles.js\"></script>
<script src=\"./dist/js/app.js\"></script>

<div class=\"container {% if destination|default('') == '/register' %} right-panel-active noanimation {% endif %}\" id=\"container\">
\t<div class=\"form-container sign-up-container\">
\t\t<form method=\"post\" action=\"/register\">
{{ form_start(registrationForm) }}
\t\t\t<h1>Zarejestruj się</h1><br>
<div class=\"input-group mb-3\">

        <div class=\"input-group-prepend\">
            <span class=\"input-group-text\"><i class=\"fas fa-user-astronaut\"></i></span>
        </div>

        {{ form_widget(registrationForm.name) }}
        {% if registrationForm.name.vars.errors|length > 0 %}
        <div>
            <small class=\"form-error\">{{ registrationForm.name.vars.errors|first.message }}</small>
        </div>
        {% endif %}
    </div>

    <div class=\"input-group mb-3\">
        <div class=\"input-group-prepend\">
        <span class=\"input-group-text\"><i class=\"fas fa-user-astronaut\"></i></span>
        </div>
        
        {{ form_widget(registrationForm.lastname) }}

        {% if registrationForm.lastname.vars.errors|length > 0 %}
        <div>
            <small class=\"form-error\">{{ registrationForm.lastname.vars.errors|first.message }}</small>
        </div>
        {% endif %}
    </div>

<div class=\"input-group mb-3\">
        <div class=\"input-group-prepend\">
        <span class=\"input-group-text\"><i class=\"fas fa-envelope\"></i></span>
        
        </div>

        {{ form_widget(registrationForm.email) }}
        {% if registrationForm.email.vars.errors|length > 0 %}
        <div>
            <small class=\"form-error\">{{ registrationForm.email.vars.errors|first.message }}</small>
        </div>
        {% endif %}
    </div>


<div class=\"input-group mb-3\">
    <div class=\"input-group-prepend\">
    <span class=\"input-group-text\"><i class=\"fas fa-lock\"></i></span>
    </div>
        
    {{ form_widget(registrationForm.plainPassword) }}
    <div>
    {% for error in registrationForm.plainPassword.vars.errors %}
        <small class=\"form-error\">{{ error.message }}</small>
    {% endfor %}
    </div>
</div>

<div class=\"input-group mb-3\">
    {{ form_widget(registrationForm.agreeTerms) }}
    <label for=\"registration_form_agreeTerms\">Akceptuję regulamin</label>
</div><br>

<button type=\"submit\">ZAREJESTRUJ SIĘ</button>
{{ form_end(registrationForm) }}
\t\t</form>
\t</div>

\t<div class=\"form-container sign-in-container\">
\t\t<form method=\"post\" action=\"/login\">
            {% for flash_error in app.flashes('verify_error') %}
        <div class=\"alert alert-danger\" role=\"alert\">{{ flash_error }}</div>
    {% endfor %}
            {% for message in app.flashes('notice') %}
    <div class=\"alert alert-success\">
        {{ message }}
    </div>
{% endfor %}
\t\t\t<h1>Zaloguj się</h1><br>
\t\t\t<div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\"><i class=\"fas fa-envelope\"></i></span>
                  </div>
                  <input type=\"email\" name=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Email\">
                </div>
      <div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\"><i class=\"fas fa-lock\"></i></span>
                  </div>
                  <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Hasło\">
                </div>
                 <input type=\"hidden\" name=\"_csrf_token\"
           value=\"{{ csrf_token('authenticate') }}\"
    >
\t\t\t<a href=\"#\">Zapomniałeś hasła?</a>
\t\t\t<button type=\"submit\">ZALOGUJ</button>
\t\t</form>
\t</div>
\t<div class=\"overlay-container\">
\t\t<div class=\"overlay\">
\t\t\t<div class=\"overlay-panel overlay-left\">
      <a href=\"/login\" class=\"navbar-brand logo\">
    <svg version=\"1.0\" xmlns=\"http://www.w3.org/2000/svg\"
    viewBox=\"0 0 508.000000 131.000000\"
    preserveAspectRatio=\"xMidYMid meet\">
    <g transform=\"translate(0.000000,131.000000) scale(0.100000,-0.100000)\"
    fill=\"currentColor\" stroke=\"none\">
    <path d=\"M575 1273 c-220 -27 -254 -51 -322 -228 l-38 -100 -74 -5 c-61 -4
    -76 -9 -92 -29 -21 -26 -24 -62 -9 -92 12 -22 60 -49 88 -49 17 0 17 -4 -7
    -72 -26 -72 -26 -78 -26 -346 l0 -274 33 -29 c81 -73 182 -10 182 114 l0 27
    493 -2 492 -3 3 -35 c7 -92 39 -130 108 -130 34 0 48 6 73 31 l31 31 -1 256
    c0 259 -3 282 -44 409 -6 18 -2 22 27 28 50 11 78 42 78 85 0 55 -27 74 -112
    80 l-70 5 -43 110 c-35 90 -51 117 -86 147 -46 42 -76 52 -199 68 -78 9 -416
    12 -485 3z m623 -190 c24 -21 107 -246 99 -268 -6 -13 -64 -15 -489 -15 -271
    0 -489 4 -497 9 -12 8 -7 30 30 133 24 67 52 131 62 140 16 17 47 18 396 18
    346 0 381 -1 399 -17z m-859 -478 c75 -38 43 -155 -42 -155 -87 0 -113 128
    -32 160 29 13 43 12 74 -5z m1029 -21 c70 -79 -51 -185 -123 -108 -35 37 -33
    78 5 116 26 25 36 29 63 24 18 -3 42 -17 55 -32z\"/>
    <path d=\"M1775 375 l0 -225 212 0 212 0 6 47 c3 27 8 56 10 66 3 18 -5 19
    -143 15 l-147 -3 -3 163 -2 162 -73 0 -72 0 0 -225z\"/>
    <path d=\"M2260 376 l0 -226 165 0 c185 0 252 11 295 46 31 27 47 77 35 114 -9
    28 -62 60 -100 60 l-30 1 37 19 c47 25 68 56 68 98 0 91 -36 105 -277 110
    l-193 4 0 -226z m311 104 c23 -13 25 -36 3 -44 -9 -3 -51 -6 -95 -6 l-79 0 0
    30 0 30 76 0 c41 0 84 -5 95 -10z m3 -160 c14 -5 26 -16 26 -24 0 -26 -35 -36
    -119 -36 l-81 0 0 35 0 35 74 0 c41 0 86 -4 100 -10z\"/>
    <path d=\"M2923 593 c-24 -5 -63 -47 -63 -68 0 -23 31 -39 92 -46 65 -8 80 -15
    58 -30 -14 -9 -50 -6 -106 7 -15 4 -23 -2 -32 -20 -11 -24 -9 -26 26 -36 63
    -17 136 -13 166 11 30 24 34 59 9 81 -10 9 -44 18 -75 20 -63 5 -81 14 -58 29
    16 10 84 3 112 -12 16 -9 28 6 28 36 0 23 -96 40 -157 28z\"/>
    <path d=\"M3173 585 c-39 -17 -53 -42 -53 -94 0 -28 7 -48 24 -68 22 -26 30
    -28 96 -28 66 0 74 2 96 28 26 31 33 92 13 129 -23 43 -114 60 -176 33z m115
    -57 c36 -36 -12 -97 -65 -83 -31 8 -43 21 -43 51 0 30 19 44 60 44 20 0 41 -5
    48 -12z\"/>
    <path d=\"M4353 585 c-39 -17 -53 -42 -53 -94 0 -28 7 -48 24 -67 20 -24 33
    -28 88 -32 58 -4 67 -2 96 23 27 23 32 33 32 72 0 57 -14 81 -55 99 -43 18
    -90 17 -132 -1z m120 -66 c18 -28 0 -67 -33 -74 -58 -13 -105 46 -68 83 18 18
    89 11 101 -9z\"/>
    <path d=\"M4885 589 c-83 -24 -69 -109 18 -109 50 0 87 -9 87 -21 0 -16 -47
    -21 -91 -9 -38 10 -44 10 -56 -6 -19 -26 -17 -31 18 -43 55 -19 143 -14 173
    10 51 40 20 99 -54 99 -44 0 -80 10 -80 21 0 17 46 20 92 6 41 -13 47 -13 52
    0 12 31 5 41 -38 52 -52 13 -79 13 -121 0z\"/>
    <path d=\"M3390 490 l0 -100 95 0 95 0 0 31 0 31 -62 -3 -63 -4 -3 73 -3 72
    -29 0 -30 0 0 -100z\"/>
    <path d=\"M3600 515 c0 -68 3 -79 26 -102 23 -23 31 -25 90 -21 91 6 107 24
    112 123 l4 75 -35 0 -36 0 -3 -66 c-3 -77 -18 -95 -65 -78 -26 9 -28 13 -31
    77 -3 67 -3 67 -32 67 l-30 0 0 -75z\"/>
    <path d=\"M3850 565 c0 -23 4 -25 45 -25 l45 0 0 -75 0 -75 30 0 29 0 3 73 3
    72 43 3 c37 3 42 6 42 28 l0 24 -120 0 -120 0 0 -25z\"/>
    <path d=\"M4110 565 c0 -20 5 -25 25 -25 23 0 25 -3 25 -50 0 -47 -2 -50 -25
    -50 -20 0 -25 -5 -25 -25 0 -25 1 -25 80 -25 78 0 80 1 80 24 0 18 -6 25 -22
    28 -20 3 -23 10 -26 51 -3 45 -2 47 22 47 21 0 26 5 26 25 0 25 -1 25 -80 25
    -79 0 -80 0 -80 -25z\"/>
    <path d=\"M4570 491 l0 -101 33 0 33 0 -4 59 c-6 90 2 93 38 14 l33 -73 48 0
    49 0 0 100 0 100 -30 0 -30 0 0 -72 c0 -82 -7 -81 -43 7 l-25 60 -51 3 -51 3
    0 -100z\"/>
    </g>
    </svg>
</a>
\t\t\t\t<h1>Masz już konto?</h1>
\t\t\t\t<p>Kliknij tutaj i zaloguj się!</p>
\t\t\t\t<button class=\"ghost\" id=\"signIn\">LOGOWANIE</button>
\t\t\t</div>
\t\t\t<div class=\"overlay-panel overlay-right\">
      <a href=\"/login\" class=\"navbar-brand logo\">
    <svg version=\"1.0\" xmlns=\"http://www.w3.org/2000/svg\"
    viewBox=\"0 0 508.000000 131.000000\"
    preserveAspectRatio=\"xMidYMid meet\">
    <g transform=\"translate(0.000000,131.000000) scale(0.100000,-0.100000)\"
    fill=\"currentColor\" stroke=\"none\">
    <path d=\"M575 1273 c-220 -27 -254 -51 -322 -228 l-38 -100 -74 -5 c-61 -4
    -76 -9 -92 -29 -21 -26 -24 -62 -9 -92 12 -22 60 -49 88 -49 17 0 17 -4 -7
    -72 -26 -72 -26 -78 -26 -346 l0 -274 33 -29 c81 -73 182 -10 182 114 l0 27
    493 -2 492 -3 3 -35 c7 -92 39 -130 108 -130 34 0 48 6 73 31 l31 31 -1 256
    c0 259 -3 282 -44 409 -6 18 -2 22 27 28 50 11 78 42 78 85 0 55 -27 74 -112
    80 l-70 5 -43 110 c-35 90 -51 117 -86 147 -46 42 -76 52 -199 68 -78 9 -416
    12 -485 3z m623 -190 c24 -21 107 -246 99 -268 -6 -13 -64 -15 -489 -15 -271
    0 -489 4 -497 9 -12 8 -7 30 30 133 24 67 52 131 62 140 16 17 47 18 396 18
    346 0 381 -1 399 -17z m-859 -478 c75 -38 43 -155 -42 -155 -87 0 -113 128
    -32 160 29 13 43 12 74 -5z m1029 -21 c70 -79 -51 -185 -123 -108 -35 37 -33
    78 5 116 26 25 36 29 63 24 18 -3 42 -17 55 -32z\"/>
    <path d=\"M1775 375 l0 -225 212 0 212 0 6 47 c3 27 8 56 10 66 3 18 -5 19
    -143 15 l-147 -3 -3 163 -2 162 -73 0 -72 0 0 -225z\"/>
    <path d=\"M2260 376 l0 -226 165 0 c185 0 252 11 295 46 31 27 47 77 35 114 -9
    28 -62 60 -100 60 l-30 1 37 19 c47 25 68 56 68 98 0 91 -36 105 -277 110
    l-193 4 0 -226z m311 104 c23 -13 25 -36 3 -44 -9 -3 -51 -6 -95 -6 l-79 0 0
    30 0 30 76 0 c41 0 84 -5 95 -10z m3 -160 c14 -5 26 -16 26 -24 0 -26 -35 -36
    -119 -36 l-81 0 0 35 0 35 74 0 c41 0 86 -4 100 -10z\"/>
    <path d=\"M2923 593 c-24 -5 -63 -47 -63 -68 0 -23 31 -39 92 -46 65 -8 80 -15
    58 -30 -14 -9 -50 -6 -106 7 -15 4 -23 -2 -32 -20 -11 -24 -9 -26 26 -36 63
    -17 136 -13 166 11 30 24 34 59 9 81 -10 9 -44 18 -75 20 -63 5 -81 14 -58 29
    16 10 84 3 112 -12 16 -9 28 6 28 36 0 23 -96 40 -157 28z\"/>
    <path d=\"M3173 585 c-39 -17 -53 -42 -53 -94 0 -28 7 -48 24 -68 22 -26 30
    -28 96 -28 66 0 74 2 96 28 26 31 33 92 13 129 -23 43 -114 60 -176 33z m115
    -57 c36 -36 -12 -97 -65 -83 -31 8 -43 21 -43 51 0 30 19 44 60 44 20 0 41 -5
    48 -12z\"/>
    <path d=\"M4353 585 c-39 -17 -53 -42 -53 -94 0 -28 7 -48 24 -67 20 -24 33
    -28 88 -32 58 -4 67 -2 96 23 27 23 32 33 32 72 0 57 -14 81 -55 99 -43 18
    -90 17 -132 -1z m120 -66 c18 -28 0 -67 -33 -74 -58 -13 -105 46 -68 83 18 18
    89 11 101 -9z\"/>
    <path d=\"M4885 589 c-83 -24 -69 -109 18 -109 50 0 87 -9 87 -21 0 -16 -47
    -21 -91 -9 -38 10 -44 10 -56 -6 -19 -26 -17 -31 18 -43 55 -19 143 -14 173
    10 51 40 20 99 -54 99 -44 0 -80 10 -80 21 0 17 46 20 92 6 41 -13 47 -13 52
    0 12 31 5 41 -38 52 -52 13 -79 13 -121 0z\"/>
    <path d=\"M3390 490 l0 -100 95 0 95 0 0 31 0 31 -62 -3 -63 -4 -3 73 -3 72
    -29 0 -30 0 0 -100z\"/>
    <path d=\"M3600 515 c0 -68 3 -79 26 -102 23 -23 31 -25 90 -21 91 6 107 24
    112 123 l4 75 -35 0 -36 0 -3 -66 c-3 -77 -18 -95 -65 -78 -26 9 -28 13 -31
    77 -3 67 -3 67 -32 67 l-30 0 0 -75z\"/>
    <path d=\"M3850 565 c0 -23 4 -25 45 -25 l45 0 0 -75 0 -75 30 0 29 0 3 73 3
    72 43 3 c37 3 42 6 42 28 l0 24 -120 0 -120 0 0 -25z\"/>
    <path d=\"M4110 565 c0 -20 5 -25 25 -25 23 0 25 -3 25 -50 0 -47 -2 -50 -25
    -50 -20 0 -25 -5 -25 -25 0 -25 1 -25 80 -25 78 0 80 1 80 24 0 18 -6 25 -22
    28 -20 3 -23 10 -26 51 -3 45 -2 47 22 47 21 0 26 5 26 25 0 25 -1 25 -80 25
    -79 0 -80 0 -80 -25z\"/>
    <path d=\"M4570 491 l0 -101 33 0 33 0 -4 59 c-6 90 2 93 38 14 l33 -73 48 0
    49 0 0 100 0 100 -30 0 -30 0 0 -72 c0 -82 -7 -81 -43 7 l-25 60 -51 3 -51 3
    0 -100z\"/>
    </g>
    </svg>
</a>
\t\t\t\t<h1>Nie masz konta?</h1>
\t\t\t\t<p>Kliknij tutaj i zarejestruj się!</p>
\t\t\t\t<button class=\"ghost\" id=\"signUp\">REJESTRACJA</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

<script type=text/javascript>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
\tcontainer.classList.add(\"right-panel-active\");
});

signInButton.addEventListener('click', () => {
\tcontainer.classList.remove(\"right-panel-active\");
});

</script>
</body>", "security/login.html.twig", "/var/www/html/templates/security/login.html.twig");
    }
}
