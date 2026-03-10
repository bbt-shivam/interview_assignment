<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/js/pages/employee_dashboard.js'
    ])
    
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                Interview Assignment
            </a>

            <div class="ms-auto">
                <a href="{{ route('logout') }}" class="btn btn-danger">
                    Logout
                </a>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container mt-5">

        <h2 class="text-center mb-4">Dashboard</h2>

        <!-- Filter Section -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_name" placeholder="Search Name">
                    </div>
                    <div class="col-md-3">
                        <input type="email" class="form-control" id="search_email" placeholder="Search Email">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="search_zipcode" placeholder="Search Zipcode">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100" id="filter-btn">
                            Filter
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-secondary w-100" id="reset-btn">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Table -->
        <div class="card">
            <div class="card-body p-0">

                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="80">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="150">State</th>
                            <th width="150">City</th>
                            <th width="150">Zipcode</th>
                            <th width="150">Created At</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>

                    <tbody id="table-data">

                        <tr>
                            <td colspan="8" class="text-center">
                                No Data Found
                            </td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </div>


        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">

            <div id="pagination-summary" class="text-muted small"></div>

            <div id="pagination-links"></div>

        </div>

    </div>

    <!-- Edit Dealer Modal -->
    <div class="modal fade" id="editDealerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Dealer Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <form id="edit-dealer-form">

                        <input type="hidden" id="dealer_id">

                        <div class="mb-3">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control" id="edit_state">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" id="edit_city">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Zipcode</label>
                            <input type="text" class="form-control" id="edit_zipcode">
                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="save-dealer-btn">
                        Update
                    </button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>