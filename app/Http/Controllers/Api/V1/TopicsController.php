<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Topic;
use App\Http\Resources\TopicResource;
use App\Http\Requests\Api\V1\TopicRequest;

class TopicsController extends Controller
{
    //
    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = $request->user()->id;
        $topic->save();

        return new TopicResource($topic);
    }
}
