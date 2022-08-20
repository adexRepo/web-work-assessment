<?php
  $history = $model['history']->getAttendanceHistory();
?>

<main class="flex-shrink-0">
  <div class="container shadow-2-strong" style="border-radius: 1rem;">
    <div class="card-body p-0 text-center">
      <div class="p-md-4 p-4 border rounded-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><?= $model['title']  ?></h1>
        </div>
        <div class="d-sm-flex section" style="border-radius: 1rem; overflow-y: scroll; max-height: 500px;">
          <table class="table table-striped table-hover table-bordered align-middle">
            <thead>
              <tr>
                <th class="table-primary" scope="col">No</th>
                <th class="table-primary" scope="col">Name</th>
                <th class="table-primary" scope="col">Date</th>
                <th class="table-primary" scope="col">Status</th>
                <th class="table-primary" scope="col">Clockin Time</th>
                <!-- <th class="table-primary" scope="col">Clockout</th> -->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($history as $index => $item): ?>
                <tr>
                  <th scope="row"><?= $index?></th>
                  <td><?= $item['name'] ?></td>
                  <td><?= $item['date'] ?></td>
                  <td><?= $item['status'] ?></td>
                  <td><?= $item['clock_in'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>