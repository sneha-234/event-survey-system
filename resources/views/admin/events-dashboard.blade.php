@extends('layouts.app')

@section('content')

<style>
    /* ===== Admin Dashboard ===== */
    .admin-wrapper {
        max-width: 1100px;
        margin: 40px auto;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .admin-header h3 {
        font-weight: 600;
        font-size: 1.3rem;
        color: #1f2937;
        margin: 0;
    }

    .admin-card {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }

    table.admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    table.admin-table thead th {
        background: #f9fafb;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #6b7280;
        padding: 14px 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    table.admin-table tbody td {
        padding: 14px 16px;
        font-size: 0.95rem;
        color: #374151;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    table.admin-table tbody tr:hover {
        background-color: #f8fafc;
    }

    .status {
        font-size: 0.85rem;
        padding: 4px 10px;
        border-radius: 999px;
        font-weight: 500;
    }

    .status.assigned {
        background: #ecfdf3;
        color: #047857;
    }

    .status.unassigned {
        background: #fef2f2;
        color: #b91c1c;
    }
</style>

<div class="admin-wrapper">

    {{-- HEADER WITH BACK BUTTON --}}
    <div class="admin-header">
        <h3>Event → Survey Dashboard</h3>

        <a href="{{ route('events.index') }}"
           class="btn btn-outline-secondary">
            ← Back to Events
        </a>
    </div>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Mode</th>
                    <th>Survey Assigned</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->mode }}</td>
                        <td>
                            @if($event->survey)
                                <span class="status assigned">
                                    {{ $event->survey->title }}
                                </span>
                            @else
                                <span class="status unassigned">
                                    Not Assigned
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('events.assignSurvey', $event->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                Assign / Change
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;color:#9ca3af;">
                            No events found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
