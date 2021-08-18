<div>
    <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('requests.update')}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Shop Name</th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <span id="userName"></span>
                                </td>
                                <td>
                                    <span id="sellerName"></span>
                                </td>
                                <td>
                                    <span id="requestDescription"></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea class="form-control" required id="reason" rows="3" name="reason" placeholder="Reason"></textarea>
                        </div>
                        <div class="form-group">
                            <input hidden type="text" class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="status_id" value="2" class="btn btn-outline-danger">Reject</button>
                        <button type="submit" name="status_id" value="3" class="btn btn-outline-success my-2 my-sm-0">Accept</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
