 <!-- Content wrapper -->
          <div class="content-wrapper" style="background-color: hsla(129, 2%, 68%, 0.5)">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <form method="POST" action="<?=base_url('index.php/Dashboard')?>">
                  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <div class="mb-3"><!-- <label for="select2Multiple" class="form-label">Multiple</label> -->
                        <select name="site" class="label ui selection fluid dropdown" id="area" required>
                          <option value="">-- Site --</option>
                          <option value="All Site">All Site</option>
                          <option value="BANDUNG">BANDUNG</option>
                          <option value="BSD">BSD</option>
                          <option value="MALANG">MALANG</option>
                          <option value="MEDAN">MEDAN</option>
                          <option value="MAKASSAR">MAKASSAR</option>
                          <option value="SEMARANG">SEMARANG</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <input type="date" name="tanggal_sekarang" class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" required/>
                    </div>
                    <div class="col-sm-2">
                      <input type="date" name="tanggal_akhir" class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" required/>
                    </div>
                    <div class="col-2">
                      <button type="submit" class="btn rounded-pill btn-primary">Search</button>
                    </div>
                  </div>
                </form>
                <div class="col-lg-9 mb-4 order-0">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3"><i class="menu-icon tf-icons bx bx-chart"></i>Total Revenue - 
                        <?php echo $tabeldata['HALO+']['area']; ?> 
                        (
                          <?php 
                            if(isset($hari['start'])) { 
                              echo date("d F Y", strtotime($hari['start'])).' - '.date("d F Y", strtotime($hari['end']));
                            }
                            else {
                              echo date("d F Y", strtotime($hari));
                            }
                          ?>
                        )
                        </h5>
                        <div id="totalRevenueChart" class="px-2"></div>
                      </div>
                      <div class="col-md-4">
                        <div class="card-body">
                          <div class="text-center">
                            <div>
                              <button class="btn btn-sm btn-outline-primary">
                                <?=date("F Y",strtotime($totalDataMonthNow['HALO+']['tanggal']))?>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div id="growthChart"></div>
                        <div class="text-center fw-semibold pt-3 mb-2">Growth Revenue</div>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between" >
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>Last Month</small>
                              <h6 class="mb-0">Rp. <?php echo number_format($totalDataLastMonth['HALO+']['revenue']+$totalDataLastMonth['P2P REGULER']['revenue']+$totalDataLastMonth['P2P CROSS']['revenue'],0,".",".")?></h6>
                            </div>
                          </div>
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>This Month</small>
                              <h6 class="mb-0">Rp. <?php echo number_format($totalDataMonthNow['HALO+']['revenue']+$totalDataMonthNow['P2P REGULER']['revenue']+$totalDataMonthNow['P2P CROSS']['revenue'],0,".",".")?></h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 order-1">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2"><i class="menu-icon tf-icons bx bx-user"></i>Best Agent</h5>
                                <span class="badge bg-label-primary rounded-pill">Month <?=date("F",strtotime($totalDataMonthNow['HALO+']['tanggal']))?> || Year <?=date("Y",strtotime($totalDataMonthNow['HALO+']['tanggal']))?></span>
                              </div>
                              <div class="mt-sm-auto">
                                <h3>
                                  <strong class="text-danger text-nowrap fw-semibold"><?=$best_agent?></strong>
                                </h3>
                                <h3 class="mb-0">Rp. <?=number_format($revenue_tertinggi,0,".",".")?></h3>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-lg-6 mb-4 order-0">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3"><i class="menu-icon tf-icons bx bx-chart"></i>Growth Sales Per Product - 
                          <?php echo $tabeldata['HALO+']['area']; ?> 
                        (
                          <?php 
                            if(isset($hari['start'])) { 
                              echo date("d F Y", strtotime($hari['start'])).' - '.date("d F Y", strtotime($hari['end']));
                            }
                            else {
                              echo date("d F Y", strtotime($hari));
                            }
                          ?>
                        )
                        </h5>
                        <div id="chartsales"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4 order-0">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3"><i class="menu-icon tf-icons bx bx-chart"></i>Growth PPA Per Product -  
                          <?php echo $tabeldata['HALO+']['area']; ?> 
                        (
                          <?php 
                            if(isset($hari['start'])) { 
                              echo date("d F Y", strtotime($hari['start'])).' - '.date("d F Y", strtotime($hari['end']));
                            }
                            else {
                              echo date("d F Y", strtotime($hari));
                            }
                          ?>
                        )
                        </h5>
                        <div id="chartppa"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="row">
                <div class="card">
                  <h5 class="card-header"><i class="menu-icon tf-icons bx bx-data"></i>Report <?php echo $tabeldata['HALO+']['area']; ?> 
                        (
                          <?php 
                            if(isset($hari['start'])) { 
                              echo date("d F Y", strtotime($hari['start'])).' - '.date("d F Y", strtotime($hari['end']));
                            }
                            else {
                              echo date("d F Y", strtotime($hari));
                            }
                          ?>
                        )
                  </h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table" id="report" style="font-weight: bold; font-size: 16px">
                      <thead>
                        <tr>
                          <th>Parameter</th>
                          <th><center>HALO+</center></th>
                          <th><center>P2P REGULER</center></th>
                          <th><center>P2P CROSS</center></th>
                          <th><center>Total</center></th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>Total Agent</strong></td>
                          <td class="text-center"><?php echo number_format($tabeldata['HALO+']['jumlah_agent'],0,".","."); ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P REGULER']['jumlah_agent'],0,".","."); ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P CROSS']['jumlah_agent'],0,".","."); ?></td>
                          <td class="text-center">
                            <?php echo  number_format($tabeldata['HALO+']['jumlah_agent']+$tabeldata['P2P REGULER']['jumlah_agent']+$tabeldata['P2P CROSS']['jumlah_agent'],0,".",".");?></td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>Total Call</strong></td>
                          <td class="text-center"><?php echo number_format($tabeldata['HALO+']['jumlah_call'],0,".",".") ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P REGULER']['jumlah_call'],0,".",".")?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P CROSS']['jumlah_call'],0,".",".")?></td>
                          <td class="text-center">
                            <?php echo number_format($tabeldata['HALO+']['jumlah_call']+$tabeldata['P2P REGULER']['jumlah_call']+$tabeldata['P2P CROSS']['jumlah_call'],0,".",".")?></td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>Total Call Contacted</strong></td>
                          <td class="text-center"><?php echo number_format($tabeldata['HALO+']['jumlah_call_contacted'],0,".",".") ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P REGULER']['jumlah_call_contacted'],0,".",".") ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P CROSS']['jumlah_call_contacted'],0,".",".") ?></td>
                          <td class="text-center">
                            <?php echo number_format($tabeldata['HALO+']['jumlah_call_contacted']+$tabeldata['P2P REGULER']['jumlah_call_contacted']+$tabeldata['P2P CROSS']['jumlah_call_contacted'],0,".",".") ?></td>
                        </tr>
                         <tr>
                          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>Total Agree</strong></td>
                          <td class="text-center"><?php echo $tabeldata['HALO+']['jumlah_call_agree']; ?></td>
                          <td class="text-center"><?php echo $tabeldata['P2P REGULER']['jumlah_call_agree']; ?></td>
                          <td class="text-center"><?php echo $tabeldata['P2P CROSS']['jumlah_call_agree']; ?></td>
                          <td class="text-center">
                            <?php echo number_format( $tabeldata['HALO+']['jumlah_call_agree']+$tabeldata['P2P REGULER']['jumlah_call_agree']+$tabeldata['P2P CROSS']['jumlah_call_agree'],0,".",".") ?></td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>Revenue</strong></td>
                          <td class="text-center">Rp. <?php echo number_format($tabeldata['HALO+']['jumlah_revenue'],0,".",".") ?></td>
                          <td class="text-center">Rp. <?php echo number_format($tabeldata['P2P REGULER']['jumlah_revenue'],0,".",".") ?></td>
                          <td class="text-center">Rp. <?php echo number_format($tabeldata['P2P CROSS']['jumlah_revenue'],0,".",".") ?></td>
                          <td class="text-center">
                            Rp. <?php echo number_format($tabeldata['HALO+']['jumlah_revenue']+$tabeldata['P2P REGULER']['jumlah_revenue']+$tabeldata['P2P CROSS']['jumlah_revenue'],0,".",".") ?></td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>RPA</strong></td>
                          <td class="text-center"><?php echo number_format($tabeldata['HALO+']['rpa'],2,',','.') ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P REGULER']['rpa'],2,',','.') ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P CROSS']['rpa'],2,',','.') ?></td>
                          <td class="text-center">
                            <?php echo number_format($tabeldata['HALO+']['rpa']+$tabeldata['P2P REGULER']['rpa']+$tabeldata['P2P CROSS']['rpa'],2,',','.') ?></td>
                        </tr>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>PPA</strong></td>
                          <td class="text-center"><?php echo number_format($tabeldata['HALO+']['ppa'],2,',','.') ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P REGULER']['ppa'],2,',','.') ?></td>
                          <td class="text-center"><?php echo number_format($tabeldata['P2P CROSS']['ppa'],2,',','.') ?></td>
                          <td class="text-center">
                            <?php
                              
                               echo $total_ppa;
                             ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->