<div class="modal fade" tabindex="-1" id="myModal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="db/check.php" method="post" class="text-center">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control" placeholder="รายการ" aria-label="First name" name="description" value>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-start">
                                <label>วันที่สั่ง</label>
                            </div>
                            <input type="date" class="form-control" placeholder="Order_date" aria-label="Last name" name="order_date"">
                        </div>
                                <br>
                        <div class=" col-6">
                            <div class="text-start">
                                <label>วันที่กำหนดส่ง</label>
                            </div>
                            <input type="date" class="form-control" placeholder="Deadline" aria-label="Last name" name="deadline">
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-secondary back-page" data-bs-dismiss="modal">Close</button>
                    <button type="sumit" class="btn btn-primary" name="action" value="addData">Save</button>
                </form>
            </div>

        </div>
    </div>
</div>