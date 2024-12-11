@extends('layouts.vertical', ['title' => 'Todo'])

@section('content')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between gap-3">
            <div class="search-bar">
              <span><i class="bx bx-search-alt"></i></span>
              <input type="search" class="form-control" id="search" placeholder="Search task...">
            </div>
            <div>
              <a href="#!" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i>Create Task
              </a>
            </div>
          </div> <!-- end row -->
        </div>
        <div>
          <div class="table-responsive table-centered">
            <table class="table text-nowrap mb-0">
              <thead class="bg-light bg-opacity-50">
                <tr>
                  <th class="border-0 py-2">Task Name</th>
                  <th class="border-0 py-2">Created Date</th>
                  <th class="border-0 py-2">Due Date</th>
                  <th class="border-0 py-2">Assigned</th>
                  <th class="border-0 py-2">Status</th>
                  <th class="border-0 py-2">Priority</th>
                  <th class="border-0 py-2">Action</th>
                </tr>
              </thead> <!-- end thead-->
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          id="customCheck1">
                        <label class="form-check-label" for="customCheck1">Review system logs for any
                          reported errors</label>
                      </div>
                    </div>
                  </td>
                  <td>23 April, 2024 <small>05:09 PM</small></td>
                  <td>30 April, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-2.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Sean Kemper</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-warning">In-progress</span>
                  </td>
                  <td class="text-danger"><i class="bx bxs-circle me-1"></i>High</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          checked id="customCheck2">
                        <label class="form-check-label" for="customCheck2">Conduct user testing to
                          identify potential bugs</label>
                      </div>
                    </div>
                  </td>
                  <td>14 May, 2024 <small>10:51 AM</small></td>
                  <td>25 Aug, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-3.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Victoria Sullivan</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-primary">Pending</span>
                  </td>
                  <td class="text-success"><i class="bx bxs-circle me-1"></i>Low</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          id="customCheck3">
                        <label class="form-check-label" for="customCheck3">Gather feedback from
                          stakeholders regarding any issues</label>
                      </div>
                    </div>
                  </td>
                  <td>12 April, 2024 <small>12:09 PM</small></td>
                  <td>28 April, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-4.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Liam Martinez</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-warning">In-progress</span>
                  </td>
                  <td class="text-danger"><i class="bx bxs-circle me-1"></i>High</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          id="customCheck4">
                        <label class="form-check-label" for="customCheck4">Prioritize bugs based on
                          severity and impact </label>
                      </div>
                    </div>
                  </td>
                  <td>10 April, 2024 <small>10:09 PM</small></td>
                  <td>15 April, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-5.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Emma Johnson</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-success">Completed</span>
                  </td>
                  <td class="text-warning"><i class="bx bxs-circle me-1"></i>Medium</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          id="customCheck5">
                        <label class="form-check-label" for="customCheck5">Investigate and analyze
                          the root cause of each bug</label>
                      </div>
                    </div>
                  </td>
                  <td>22 May, 2024 <small>03:41 PM</small></td>
                  <td>05 July, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-1.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Olivia Thompson</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-primary">Pending</span>
                  </td>
                  <td class="text-success"><i class="bx bxs-circle me-1"></i>Low</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          id="customCheck6">
                        <label class="form-check-label" for="customCheck6">Develop and implement
                          fixes for the identified bugs</label>
                      </div>
                    </div>
                  </td>
                  <td>18 May, 2024 <small>09:09 AM</small></td>
                  <td>30 April, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-6.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Noah Garcia</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-success">Completed</span>
                  </td>
                  <td class="text-success"><i class="bx bxs-circle me-1"></i>Low</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          id="customCheck7">
                        <label class="form-check-label" for="customCheck7">Complete any recurring
                          tasks</label>
                      </div>
                    </div>
                  </td>
                  <td>05 April, 2024 <small>08:50 AM</small></td>
                  <td>22 April, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-7.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Sophia Davis</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-info">New</span>
                  </td>
                  <td class="text-danger"><i class="bx bxs-circle me-1"></i>High</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          id="customCheck8">
                        <label class="form-check-label" for="customCheck8">Check emails and
                          respond</label>
                      </div>
                    </div>
                  </td>
                  <td>15 Jun, 2024 <small>11:09 PM</small></td>
                  <td>01 Aug, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-8.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Isabella Lopez</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-primary">Pending</span>
                  </td>
                  <td class="text-success"><i class="bx bxs-circle me-1"></i>Low</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          checked id="customCheck9">
                        <label class="form-check-label" for="customCheck9">Review schedule for the
                          day</label>
                      </div>
                    </div>
                  </td>
                  <td>22 April, 2024 <small>05:09 PM</small></td>
                  <td>30 April, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-9.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Ava Wilson</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-warning">In-progress</span>
                  </td>
                  <td class="text-warning"><i class="bx bxs-circle me-1"></i>Medium</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="form-check form-todo ps-4">
                        <input type="checkbox" class="form-check-input rounded-circle mt-0 fs-18"
                          id="customCheck10">
                        <label class="form-check-label" for="customCheck10">Daily stand-up
                          meeting</label>
                      </div>
                    </div>
                  </td>
                  <td>23 April, 2024 <small>12:09 PM</small></td>
                  <td>30 April, 2024</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="/images/users/avatar-10.jpg" alt=""
                        class="avatar-xs rounded-circle me-2">
                      <div>
                        <h5 class="fs-14 m-0 fw-normal">Oliver Lee</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-soft-warning">In-progress</span>
                  </td>
                  <td class="text-danger"><i class="bx bxs-circle me-1"></i>High</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-soft-secondary me-1"><i
                        class="bx bx-edit fs-16"></i></button>
                    <button type="button" class="btn btn-sm btn-soft-danger"><i
                        class="bx bx-trash fs-16"></i></button>
                  </td>
                </tr>

              </tbody> <!-- end tbody -->
            </table> <!-- end table -->
          </div> <!-- table responsive -->
          <div
            class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top">
            <div class="col-sm">
              <div class="text-muted">
                Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">52</span>
                tasks
              </div>
            </div>
            <div class="col-sm-auto mt-3 mt-sm-0">
              <ul class="pagination pagination-rounded m-0">
                <li class="page-item">
                  <a href="#" class="page-link"><i class='bx bx-left-arrow-alt'></i></a>
                </li>
                <li class="page-item active">
                  <a href="#" class="page-link">1</a>
                </li>
                <li class="page-item">
                  <a href="#" class="page-link">2</a>
                </li>
                <li class="page-item">
                  <a href="#" class="page-link">3</a>
                </li>
                <li class="page-item">
                  <a href="#" class="page-link"><i class='bx bx-right-arrow-alt'></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div> <!-- end card body -->
      </div> <!-- end card -->
    </div> <!-- end col -->
  </div> <!-- end row -->
@endsection
