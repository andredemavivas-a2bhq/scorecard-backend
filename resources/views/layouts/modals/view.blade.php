<!-- Modal -->
  <div class="modal fade" id="view-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
              <table class="table table-bordered" id="taskTable">
                  <thead class="text-center bg-info text-white">
                      <tr>
                          <th>Title</th>
                          <th>Priority</th>
                          <th>Duedate</th>
                          <th>Tech Level</th>
                          <th>Completion</th>
                          <th>Estimated Hour</th>
                          <th>Actual Time</th>
                      </tr>
                  </thead>
                  <tbody class ="text-center" id="scorecardBody">

                  </tbody>
              </table>
              <table class="table table-bordered" id="breakTable">
                <thead class="text-center bg-danger text-white">
                    <tr>
                        <th>Break In</th>
                        <th>Break Out</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="breakBody">

                </tbody>
              </table>
              </table>
              <table class="table table-bordered" id="projectTable">
                <thead class="text-center bg-warning">
                    <tr>
                        <th>Project Name</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody class="text-center" id="projectBody">

                </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button id="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>