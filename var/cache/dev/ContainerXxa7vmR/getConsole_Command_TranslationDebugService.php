<?php

namespace ContainerXxa7vmR;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_TranslationDebugService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'console.command.translation_debug' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\TranslationDebugCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['console.command.translation_debug'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\TranslationDebugCommand(($container->services['translator'] ?? self::getTranslatorService($container)), ($container->privates['translation.reader'] ?? $container->load('getTranslation_ReaderService')), ($container->privates['translation.extractor'] ?? $container->load('getTranslation_ExtractorService')), 'C:\\duzy_projekt_programowanie/translations', 'C:\\duzy_projekt_programowanie/templates', ['C:\\duzy_projekt_programowanie\\vendor\\symfony\\validator/Resources/translations', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\form/Resources/translations', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\security-core/Resources/translations'], ['C:\\duzy_projekt_programowanie\\vendor\\symfony\\twig-bridge/Resources/views/Email', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\twig-bridge/Resources/views/Form', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\http-kernel\\Controller\\ArgumentResolver\\RequestPayloadValueResolver.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\framework-bundle\\Command\\TranslationDebugCommand.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\framework-bundle\\CacheWarmer\\TranslationsCacheWarmer.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\form\\Extension\\Core\\Type\\ChoiceType.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\form\\Extension\\Core\\Type\\FileType.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\form\\Extension\\Core\\Type\\ColorType.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\form\\Extension\\Core\\Type\\TransformationFailureExtension.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\form\\Extension\\Validator\\Type\\FormTypeValidatorExtension.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\form\\Extension\\Validator\\Type\\UploadValidatorExtension.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\form\\Extension\\Csrf\\Type\\FormTypeCsrfExtension.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\validator\\ValidatorBuilder.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\serializer\\Normalizer\\ProblemNormalizer.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\serializer\\SerializerAwareTrait.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\twig-bridge\\Extension\\TranslationExtension.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\twig-bridge\\Extension\\FormExtension.php', 'C:\\duzy_projekt_programowanie\\vendor\\symfony\\translation\\DataCollector\\TranslationDataCollector.php'], []);

        $instance->setName('debug:translation');
        $instance->setDescription('Display translation messages information');

        return $instance;
    }
}