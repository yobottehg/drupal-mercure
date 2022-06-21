<?php

namespace Drupal\article_updates;

use Drupal\jsonapi_extras\EntityToJsonApi;
use Drupal\node\NodeInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

class ArticleUpdatesService
{
  public const BASE_TOPIC_URL = 'https://drupalmercure.lndo.site/jsonapi/node/';

  public function __construct(
    private HubInterface $mercure,
    private EntityToJsonApi $entityToJsonApi
  ) { }

  public function deleteUpdate(NodeInterface $node): void
  {
    $topic = self::BASE_TOPIC_URL . $node->getType() . '/' . $node->uuid();

    $update = new Update(
      $topic,
      json_encode([
        'action' => 'delete',
        'id' => $node->uuid(),
        'data' => []
      ])
    );

    $this->mercure->publish($update);
  }

  public function editUpdate(NodeInterface $node): void
  {
    $topic = self::BASE_TOPIC_URL . $node->getType() . '/' . $node->uuid();

    $update = new Update(
      $topic,
      json_encode([
        'action' => 'edit',
        'id' => $node->uuid(),
        'data' => $this->entityToJsonApi->normalize($node)
      ])
    );

    $this->mercure->publish($update);
  }

  public function createUpdate(NodeInterface $node): void
  {
    $topic = self::BASE_TOPIC_URL . $node->getType();

    $update = new Update(
      $topic,
      json_encode([
        'action' => 'create',
        'id' => $node->uuid(),
        'data' => $this->entityToJsonApi->normalize($node)
      ])
    );

    $this->mercure->publish($update);
  }


}
