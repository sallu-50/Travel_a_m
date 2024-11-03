<!-- resources/views/filament/widgets/two-tables-widget.blade.php -->

<div style="max-width: 800px; margin: 0 auto; padding: 16px;">
    <style>
        .table-container {
            background-color: #f3f4f6;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 16px;
            border: 1px solid #e5e7eb;
            margin-bottom: 24px;
            overflow-x: auto;
        }

        .table-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #252629;
            margin-bottom: 16px;
            text-align: center;
        }

        table {
            width: 100%;
            min-width: 600px;
            /* Ensures readability with overflow */
            border-collapse: collapse;
        }

        thead th {
            background-color: #2563eb;
            color: #ffffff;
            font-weight: 600;
            text-align: left;
            padding: 12px;
            border-bottom: 2px solid #1e3a8a;
        }

        .canceled thead th {
            background-color: #dc2626;
            border-bottom: 2px solid #991b1b;
        }

        tbody td {
            padding: 12px;
            color: #4b5563;
            border-bottom: 1px solid #e5e7eb;
        }

        tbody tr:hover {
            background-color: #e0f2fe;
        }

        .canceled tbody tr:hover {
            background-color: #fee2e2;
        }
    </style>

    <!-- Table for Approved Registrations -->
    <div class="table-container">
        <h2 class="table-title">Approved Registrations</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Phone</th>
                    <th>Passport Number</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getTableOneData() as $item)
                    <tr>
                        <td>{{ $item['full_name'] }}</td>
                        <td>{{ $item['fathers_name'] }}</td>
                        <td>{{ $item['mothers_name'] }}</td>
                        <td>{{ $item['phone'] }}</td>
                        <td>{{ $item['passport'] }}</td>
                        <td>{{ $item['type'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Table for Canceled Registrations -->
    <div class="table-container canceled">
        <h2 class="table-title">Canceled Registrations</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Phone</th>
                    <th>Passport Number</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getTableTwoData() as $item)
                    <tr>
                        <td>{{ $item['full_name'] }}</td>
                        <td>{{ $item['fathers_name'] }}</td>
                        <td>{{ $item['mothers_name'] }}</td>
                        <td>{{ $item['phone'] }}</td>
                        <td>{{ $item['passport'] }}</td>
                        <td>{{ $item['type'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
