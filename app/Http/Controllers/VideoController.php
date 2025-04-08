<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * List all videos with pagination.
     */
    public function index()
    {
        $videos = Video::with('category')->paginate(10);

        return response()->json([
            'status' => true,
            'message' => 'Videos fetched successfully',
            'data' => $videos,
        ]);
    }

    /**
     * Show a single video.
     */
    public function show($id)
    {
        $video = Video::with('category')->findOrFail($id);

        return response()->json([
            'status' => true,
            'message' => 'Video fetched successfully',
            'data' => $video,
        ]);
    }

    /**
     * Store a new video.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:processing,completed,failed',
            'category_id' => 'required|exists:categories,id',
            'video_url' => 'required|url'
        ]);

        $video = Video::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Video created successfully',
            'data' => $video,
        ]);
    }

    /**
     * Update an existing video.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:processing,completed,failed',
            'category_id' => 'sometimes|required|exists:categories,id',
            'video_url' => 'sometimes|required|url'
        ]);

        $video = Video::findOrFail($id);
        $video->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Video updated successfully',
            'data' => $video,
        ]);
    }

    /**
     * Delete a video.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return response()->json([
            'status' => true,
            'message' => 'Video deleted successfully',
        ]);
    }
}