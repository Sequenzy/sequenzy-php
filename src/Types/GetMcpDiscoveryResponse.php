<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetMcpDiscoveryResponse extends JsonSerializableType
{
    /**
     * @var value-of<GetMcpDiscoveryResponseDescription> $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var value-of<GetMcpDiscoveryResponseDocumentation> $documentation
     */
    #[JsonProperty('documentation')]
    public string $documentation;

    /**
     * @var value-of<GetMcpDiscoveryResponseName> $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<GetMcpDiscoveryResponseRepository> $repository
     */
    #[JsonProperty('repository')]
    public string $repository;

    /**
     * @var value-of<GetMcpDiscoveryResponseTransport> $transport
     */
    #[JsonProperty('transport')]
    public string $transport;

    /**
     * @var value-of<GetMcpDiscoveryResponseUrl> $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   description: value-of<GetMcpDiscoveryResponseDescription>,
     *   documentation: value-of<GetMcpDiscoveryResponseDocumentation>,
     *   name: value-of<GetMcpDiscoveryResponseName>,
     *   repository: value-of<GetMcpDiscoveryResponseRepository>,
     *   transport: value-of<GetMcpDiscoveryResponseTransport>,
     *   url: value-of<GetMcpDiscoveryResponseUrl>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'];
        $this->documentation = $values['documentation'];
        $this->name = $values['name'];
        $this->repository = $values['repository'];
        $this->transport = $values['transport'];
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
