<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|JsonResponse
     */
    public function index()
    {
        $this->authorize('viewAny', Event::class);

        return $this->render(
            $this->paginate(
                Event::query()
                    ->orderBy('created_at', 'desc')
            )
        );
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return Response|JsonResponse
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Event  $event
    //  * @return Response|JsonResponse
    //  */
    // public function show(Event $event)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Event  $event
    //  * @return Response|JsonResponse
    //  */
    // public function update(Request $request, Event $event)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Event  $event
    //  * @return Response|JsonResponse
    //  */
    // public function destroy(Event $event)
    // {
    //     //
    // }
}
