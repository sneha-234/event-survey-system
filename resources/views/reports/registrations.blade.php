<style>
    /* ===== Admin Report Layout ===== */
    .admin-wrapper {
        max-width: 1100px;
        margin: 40px auto;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .admin-header h3 {
        font-weight: 600;
        font-size: 1.25rem;
        color: #1f2937; /* slate-800 */
        margin: 0;
    }

    /* ===== Table Card ===== */
    .admin-card {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e5e7eb; /* gray-200 */
        overflow: hidden;
    }

    table.admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    table.admin-table thead th {
        background: #f9fafb; /* gray-50 */
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #6b7280; /* gray-500 */
        padding: 14px 16px;
        border-bottom: 1px solid #e5e7eb;
    }

    table.admin-table tbody td {
        padding: 14px 16px;
        font-size: 0.95rem;
        color: #374151; /* gray-700 */
        border-bottom: 1px solid #f1f5f9;
    }

    table.admin-table tbody tr:hover {
        background-color: #f8fafc; /* very light hover */
    }

    /* ===== Status Pills ===== */
    .status {
        display: inline-flex;
        align-items: center;
        font-size: 0.85rem;
        padding: 4px 10px;
        border-radius: 999px;
        font-weight: 500;
    }

    .status.yes {
        background: #ecfdf3;
        color: #047857;
    }

    .status.no {
        background: #fef2f2;
        color: #b91c1c;
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
        <h3>Registrations — {{ $event->name }}</h3>
    </div>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Survey Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($registrations as $r)
                    <tr>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->email }}</td>
                        <td>{{ $r->phone }}</td>
                        <td>
                            @if($r->survey_completed)
                                <span class="status yes">Completed</span>
                            @else
                                <span class="status no">Pending</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-row">
                            No registrations found for this event.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
