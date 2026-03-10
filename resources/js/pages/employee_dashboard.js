
import { Modal } from "bootstrap";

$(function () {

    let currentPage = 1;
    loadDealers();

    $('#filter-btn').on('click', function () {
        currentPage = 1;
        loadDealers();
    });

    $('#reset-btn').on('click', function () {
        $('#search_name').val('');
        $('#search_email').val('');
        $('#search_zipcode').val('');
        currentPage = 1;
        loadDealers();
    });

    $(document).on('click', '#pagination-links a', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        if (!url) return;
        let page = new URL(url).searchParams.get('page');
        currentPage = page;
        loadDealers();
    });

    function loadDealers() {
        $.ajax({
            url: '/dealers/list',
            type: 'GET',
            data: {
                name: $('#search_name').val(),
                email: $('#search_email').val(),
                zipcode: $('#search_zipcode').val(),
                page: currentPage
            },
            headers: {
                'Accept': 'application/json'
            },
            beforeSend: function () {
                $('#table-data').html(`
                    <tr>
                        <td colspan="8" class="text-center">
                            Loading...
                        </td>
                    </tr>
                `);
            },
            success: function (response) {
                if (response.error === false) {
                    renderRows(response.data.rows);
                    $('#pagination-links').html(response.data.pagination);
                }
            },
            error: function () {
                $('#table-data').html(`
                    <tr>
                        <td colspan="8" class="text-center text-danger">
                            Failed to load data
                        </td>
                    </tr>
                `);
            }
        });
    }

    function renderRows(rows) {
        if (!rows.length) {
            $('#table-data').html(`
                <tr>
                    <td colspan="8" class="text-center">
                        No Data Found
                    </td>
                </tr>
            `);
            return;
        }
        
        let html = '';
        rows.forEach(function (dealer) {
            html += `
                <tr>
                    <td>${dealer.id}</td>
                    <td>${dealer.name}</td>
                    <td>${dealer.email}</td>
                    <td>${dealer.state}</td>
                    <td>${dealer.city}</td>
                    <td>${dealer.zipcode}</td>
                    <td>${dealer.created_at}</td>
                    <td>
                        <button 
                            class="btn btn-sm btn-primary edit-btn"
                            data-id="${dealer.id}"
                            data-state="${dealer.state ?? ''}"
                            data-city="${dealer.city ?? ''}"
                            data-zipcode="${dealer.zipcode ?? ''}">
                            Edit
                        </button>
                    </td>
                </tr>
            `;
        });
        $('#table-data').html(html);

    }

    let editModal = new Modal(
        document.getElementById('editDealerModal')
    );

    $(document).on('click', '.edit-btn', function () {

        let id = $(this).data('id');
        $('#dealer_id').val(id);
        $('#edit_state').val($(this).data('state'));
        $('#edit_city').val($(this).data('city'));
        $('#edit_zipcode').val($(this).data('zipcode'));
        editModal.show();
    });

    $('#save-dealer-btn').on('click', function () {
        let id = $('#dealer_id').val();
        $.ajax({
            url: `/dealers/${id}/address`,
            type: 'PUT',
            data: {
                state: $('#edit_state').val(),
                city: $('#edit_city').val(),
                zipcode: $('#edit_zipcode').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            headers: {
                'Accept': 'application/json'
            },
            success: function (response) {
                if (response.error === false) {
                    alert(response.message);
                    editModal.hide();
                    loadDealers(currentPage);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    alert("Validation failed");
                }
            }
        });
    });
});