<?php

namespace ShipStream\Ups\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use ShipStream\Ups\Api\Runtime\Normalizer\CheckArray;
use ShipStream\Ups\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class RateAlternateDeliveryAddressAddressNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'ShipStream\\Ups\\Api\\Model\\RateAlternateDeliveryAddressAddress';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'ShipStream\\Ups\\Api\\Model\\RateAlternateDeliveryAddressAddress';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ShipStream\Ups\Api\Model\RateAlternateDeliveryAddressAddress();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('AddressLine', $data)) {
            $values = array();
            foreach ($data['AddressLine'] as $value) {
                $values[] = $value;
            }
            $object->setAddressLine($values);
            unset($data['AddressLine']);
        }
        if (\array_key_exists('City', $data)) {
            $object->setCity($data['City']);
            unset($data['City']);
        }
        if (\array_key_exists('StateProvinceCode', $data)) {
            $object->setStateProvinceCode($data['StateProvinceCode']);
            unset($data['StateProvinceCode']);
        }
        if (\array_key_exists('PostalCode', $data)) {
            $object->setPostalCode($data['PostalCode']);
            unset($data['PostalCode']);
        }
        if (\array_key_exists('CountryCode', $data)) {
            $object->setCountryCode($data['CountryCode']);
            unset($data['CountryCode']);
        }
        if (\array_key_exists('ResidentialAddressIndicator', $data)) {
            $object->setResidentialAddressIndicator($data['ResidentialAddressIndicator']);
            unset($data['ResidentialAddressIndicator']);
        }
        if (\array_key_exists('POBoxIndicator', $data)) {
            $object->setPOBoxIndicator($data['POBoxIndicator']);
            unset($data['POBoxIndicator']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $values = array();
        foreach ($object->getAddressLine() as $value) {
            $values[] = $value;
        }
        $data['AddressLine'] = $values;
        if ($object->isInitialized('city') && null !== $object->getCity()) {
            $data['City'] = $object->getCity();
        }
        if ($object->isInitialized('stateProvinceCode') && null !== $object->getStateProvinceCode()) {
            $data['StateProvinceCode'] = $object->getStateProvinceCode();
        }
        if ($object->isInitialized('postalCode') && null !== $object->getPostalCode()) {
            $data['PostalCode'] = $object->getPostalCode();
        }
        $data['CountryCode'] = $object->getCountryCode();
        if ($object->isInitialized('residentialAddressIndicator') && null !== $object->getResidentialAddressIndicator()) {
            $data['ResidentialAddressIndicator'] = $object->getResidentialAddressIndicator();
        }
        if ($object->isInitialized('pOBoxIndicator') && null !== $object->getPOBoxIndicator()) {
            $data['POBoxIndicator'] = $object->getPOBoxIndicator();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('ShipStream\\Ups\\Api\\Model\\RateAlternateDeliveryAddressAddress' => false);
    }
}