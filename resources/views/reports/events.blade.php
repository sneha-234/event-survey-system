@extends('layouts.app')

@section('content')

<style>
    /* ===== Event Report ===== */
    .report-wrapper {
        max-width: 1100px;
        margin: 40px auto;
    }

    .report-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 20px;
    }

    .report-card {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }

    table.report-table {
        width: 100%;
        border-collapse: collapse;
    }

    table.report-table thead th {
        background: #f9fafb;
        padding: 14px 16px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #6b7280;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
    }

    table.report-table tbody td {
        padding: 14px 16px;
        font-size: 0.95rem;
        color: #374151;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    table.report-table tbody tr:hover {
        background-color: #f8fafc;
    }

    .badge {
        display: inline-block;
        padding: 4px 10px;
        font-size: 0.75rem;
        font-weight: 500;
        border-radius: 999px;
    }

    .badge.online {
        background: #ecfdf3;
        color: #047857;
    }

    .badge.offline {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .action-links a {
        font-size: 0.85rem;
        text-decoration: none;
        margin-right: 10px;
        font-weight: 500;
        color: #2563eb;
    }

    .action-links a:hover {
        text-decoration: underline;
    }
</style>

<div class="report-wrapper">

    <div class="report-title">
        📊 Event Report
    </div>

    <div class="report-card">
        <table class="report-table">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Mode</th>
                    <th>Registrations</th>
                    <th>Survey Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>

                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>

                    <td>
                        <span class="badge {{ strtolower($event->mode) }}">
                            {{ $event->mode }}
                        </span>
                    </td>

                    <td>{{ $event->registrations_count }}</td>

                    <td>{{ $event->survey_submitted }}</td>

                    <td class="action-links">
                        <a href="/reports/events/{{ $event->id }}">👥 Registrations</a>
                        <a href="/reports/survey/{{ $event->id }}">📝 Survey Data</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;color:#9ca3af;padding:20px;">
                        No events data available.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
