<?php
namespace UsabilityDynamics\MijirehClient {

  if (!class_exists('\UsabilityDynamics\MijirehClient\RestJSON')) {
    /**
     * Class RestJSON
     * @package UsabilityDynamics\MijirehClient
     */
    class RestJSON extends Rest
    {

      public function post($url, $data, $headers = array())
      {
        return parent::post($url, json_encode($data), $headers);
      }

      public function put($url, $data, $headers = array())
      {
        return parent::put($url, json_encode($data), $headers);
      }

      protected function prepRequest($opts, $url)
      {
        $opts[CURLOPT_HTTPHEADER][] = 'Accept: application/json';
        $opts[CURLOPT_HTTPHEADER][] = 'Content-Type: application/json';
        return parent::prepRequest($opts, $url);
      }

      public function processBody($body)
      {
        return json_decode($body, true);
      }

    }
  }
}