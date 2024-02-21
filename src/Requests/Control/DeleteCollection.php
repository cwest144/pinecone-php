<?php

namespace Probots\Pinecone\Requests\Collections;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * @link https://docs.pinecone.io/reference/delete_collection
 */
class DeleteCollection extends Request
{

    protected Method $method = Method::DELETE;

    public function __construct(
        protected string $name
    ) {}

    public function resolveEndpoint(): string
    {
        return '/collections/' . $this->name;
    }

    public function hasRequestFailed(Response $response): ?bool
    {
        return $response->status() !== 202;
    }
}
