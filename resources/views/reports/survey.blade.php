<style>
    /* ===== Admin Survey Layout ===== */
    .admin-wrapper {
        max-width: 1200px;
        margin: 40px auto;
    }

    .admin-header {
        margin-bottom: 18px;
    }

    .admin-header h3 {
        font-weight: 600;
        font-size: 1.25rem;
        color: #1f2937;
        margin: 0;
    }

    /* ===== Table Card ===== */
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
        vertical-align: top;
    }

    table.admin-table tbody td {
        padding: 14px 16px;
        font-size: 0.95rem;
        color: #374151;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: top;
        line-height: 1.4;
    }

    table.admin-table tbody tr:hover {
        background-color: #f8fafc;
    }

    /* ===== Long Text Handling ===== */
    .wrap-text {
        max-width: 420px;
        word-wrap: break-word;
        white-space: normal;
    }

    .date-text {
        color: #6b7280;
        font-size: 0.85rem;
        white-space: nowrap;
    }

    /* ===== Empty State ===== */
    .empty-row {
        text-align: center;
        color: #9ca3af;
        font-size: 0.95rem;
        padding: 30px;
    }
</style>

<div class="admin-wrapper">

    <div class="admin-header">
        <h3>Survey Data — {{ $event->name }}</h3>
    </div>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Participant</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Submitted On</th>
                </tr>
            </thead>

            <tbody>
                @forelse($answers as $a)
                    <tr>
                        <td>{{ $a->surveyResponse->registration->name }}</td>
                        <td class="wrap-text">{{ $a->surveyQuestion->question }}</td>
                        <td class="wrap-text">{{ $a->answer }}</td>
                        <td class="date-text">
                            {{ $a->created_at->format('d M Y, h:i A') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-row">
                            No survey responses available for this event.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
