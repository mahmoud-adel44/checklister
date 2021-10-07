<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                      Sore Review
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                   <div class="col-8">
                       <div class="row">
                           @foreach($checklists as $checklist)

                               <div class="col-md-4 col-sm-6 col-12">

                                   <div class="info-box <?php $ele =  ['bg-warning' , 'bg-info' , 'bg-primary' , 'bg-danger'  , 'bg-success']; echo  $ele[array_rand($ele)] ?>">
                                       <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

                                       <div class="info-box-content">
                                           <span class="info-box-text">{{ $checklist->name }}</span>
                                           <span class="info-box-number">{{ $checklist->user_tasks_count }}/{{ $checklist->tasks_count }}</span>

                                           <div class="progress">
                                               <div class="progress-bar" style="width: {{ ($checklist->user_tasks_count / $checklist->tasks_count) * 100 }}%"></div>
                                           </div>
                                           <span class="progress-description">
                                          {{ round(($checklist->user_tasks_count / $checklist->tasks_count) * 100) }}% Increase in 30 Days
                                        </span>
                                       </div>
                                       <!-- /.info-box-content -->
                                   </div>
                                   <!-- /.info-box -->
                               </div>
                            @endforeach
                       </div>
                   </div>
                    <div class="col-4 mt-3">
                        <div class="info-box bg-secondary">
                            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Finches</span>
                                <span class="info-box-number">{{ $checklists->sum('user_tasks_count') }}/{{ $checklists->sum('tasks_count') }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
