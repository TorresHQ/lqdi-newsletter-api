<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscriber\SubscriberRequest;
use App\Models\Subscriber;
use App\Services\Subscriber\SubscriberService;
use Illuminate\Http\JsonResponse;

class SubscriberController extends Controller
{
    protected $subscriberService;
    public function __construct(SubscriberService $subscriberService)
    {
        $this->subscriberService = $subscriberService;
    }

    public function index(): JsonResponse
    {
        $subscribers = $this->subscriberService->getAll();
        return response()->jsonResponseSuccess($subscribers, 'Subscribers retrieved successfully.', 200);
    }

    public function store(SubscriberRequest $request)
    {
        $subscriber = $this->subscriberService->create($request->all());
        return response()->jsonResponseSuccess($subscriber, 'Subscriber created successfully.', 201);
    }

    public function show (Subscriber $subscriber): JsonResponse
    {
        if (!$subscriber) {
            return response()->jsonResponseError('Subscriber not found.', 404);
        }

        return response()->jsonResponseSuccess($subscriber, 'Subscriber retrieved successfully.', 200);
    }

    public function update(SubscriberRequest $request, Subscriber $subscriber): JsonResponse
    {
        if (!$subscriber) {
            return response()->jsonResponseError('Subscriber not found.', 404);
        }

        $this->subscriberService->update($subscriber, $request->all());
        return response()->jsonResponseSuccessNoData('Subscriber updated successfully.', 200);
    }

    public function destroy(Subscriber $subscriber)
    {
        if (!$subscriber) {
            return response()->jsonResponseError('Subscriber not found.', 404);
        }

        $this->subscriberService->delete($subscriber);
        return response()->jsonResponseSuccessNoData('Subscriber deleted successfully.', 200);
    }

    public function welcomeSubscriber(Subscriber $subscriber)
    {
        if (!$subscriber) {
            return response()->jsonResponseError('Subscriber not found.', 404);
        }

        $this->subscriberService->emailWelcomeSubscriber($subscriber);
        return response()->jsonResponseSuccessNoData('Welcome email sent successfully.', 200);
    }
}
