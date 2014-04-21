<?php

/**
 * Test html5shiv
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Apnet\Tests;

use Apnet\FunctionalTestBundle\Framework\WebTestCase;

/**
 * Test html5shiv
 */
class Html5ShivTest extends WebTestCase
{

  /**
   * Test imported files
   *
   * @param string $source Source path in app/Resources
   * @param string $target Target path
   *
   * @return null
   * @dataProvider staticCollectionProvider
   */
  public function testImportedFiles($source, $target)
  {
    $client = self::createClient();

    $client->request("GET", $target);
    $response = $client->getResponse();

    $this->assertEquals(200, $response->getStatusCode());

    $container = $client->getContainer();
    $path = $container->getParameter("kernel.root_dir") . "/Resources" . $source;

    $this->assertEquals(
      file_get_contents($path), $response->getContent()
    );
  }

  /**
   * testStaticCollection dataProvider
   *
   * @return array
   */
  public function staticCollectionProvider()
  {
    return array(
      array(
        "/assets/dist/html5shiv.js",
        "/html5shiv/dist/html5shiv.js"
      ),
      array(
        "/assets/dist/html5shiv.min.js",
        "/html5shiv/dist/html5shiv.min.js"
      ),
      array(
        "/assets/dist/html5shiv-printshiv.js",
        "/html5shiv/dist/html5shiv-printshiv.js"
      ),
      array(
        "/assets/dist/html5shiv-printshiv.min.js",
        "/html5shiv/dist/html5shiv-printshiv.min.js"
      ),
    );
  }
}
