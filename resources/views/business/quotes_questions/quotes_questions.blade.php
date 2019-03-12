@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Dashboard </a>/<span class="q_breadcrumb"> Quotes and questions</span></div>
      </section>
      <section>
         <div class="container">
            <div class="qq_main">
               <h1>Quotes and Questions</h1>
               <div class="questions_tabs_main">
                  <div class="quote_question">
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#Quotes">Quotes</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#Questions">Questions</a>
                        </li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane container active" id="Quotes">
                           <form id="search_quotes" action="" method="POST">
                              <div class="search_filter">
                                 <h1>Search filter</h1>
                                 <div class="row searchf_input">
                                    <div class="form-group custom_errow col-md-6 col-12">
                                       <label for="inputPassword4">Status</label>
                                       <select name="select_status" class="form-control" id="exampleSelect1" required>
                                          <option value="all" selected="">All</option>
                                          <option value="1" @if($quote_status == 1) selected @endif>New</option>
                                          <option value="2" @if($quote_status == 2) selected @endif>Read</option>
                                          <option value="3" @if($quote_status == 3) selected @endif>Quoted</option>
                                          <option value="4" @if($quote_status == 4) selected @endif>Accepted</option>
                                          <option value="5" @if($quote_status == 5) selected @endif>Rejected/Ignored</option>
                                       </select>
                                       <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                       <label for="inputPassword4">Keyword</label>
                                       <input type="text" class="form-control bus_quote_keyword" name="bus_quote_keyword" value="@if(!empty($quote_keyword)){{$quote_keyword}} @endif" id="inputPassword4">
                                    </div>
                                 </div>
                                 <div class="search_btn">
                                    <a href="javascript:;"><input type="submit" name="search_submt" value="Search"></a>
                                 </div>
                              </div>
                           </form>
                           <div class="all_quote_section">
                           @foreach($quotes as $quote)
                           <!-- <div class="quote_section" style="display:none;"> -->
                           <div class="quote_section">
                              <?php
                              $quote_id = $quote['quote_id'];
                              ?>
                              @if($quote['status'] == 1)
                              <a href="{{ url('/business_user/quotes_request/'.$quote_id) }}" class="new_quote">
                              @elseif($quote['status'] == 2)
                              <a href="{{ url('/business_user/quotes_request/'.$quote_id) }}" class="new_quote q_quoted">
                              @elseif($quote['status'] == 3)
                              <a href="{{ url('/business_user/quoted_accepted/'.$quote_id.'/3') }}" class="new_quote q_quoted">
                              @elseif($quote['status'] == 4)
                              <a href="{{ url('/business_user/quoted_accepted/'.$quote_id.'/4') }}" class="new_quote q_accepted">
                              @else
                              <a href="" class="new_quote">
                              @endif
                              
                                 <div class="quote_detail">
                                    <h1>Quote id : {{$quote['get_quotes']['quote_id']}}</h1>
                                    <div class="created_date_for_mobile">
                                       <?php $datetime = $quote['get_quotes']['created_at'];
                                            $splitTimeStamp = explode(" ",$datetime);
                                            // $date = $splitTimeStamp[0];
                                            // $time = $splitTimeStamp[1];
                                            $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                                            $time = date('H:i',strtotime($splitTimeStamp[1]));
                                      ?>

                                       <span class="c_time">{{$time}}</span>
                                       <span class="c_date">{{$date}}</span>
                                    </div>
                                    <div class="Q_tag">
                                       @if($quote['status'] == 1)
                                       <div class="new_lable">NEW</div>
                                       @elseif($quote['status'] == 2)
                                       <div class="new_lable q_quoted_table">READ</div>
                                       @elseif($quote['status'] == 3)
                                       <div class="new_lable q_quoted_table">QUOTED</div>
                                       @elseif($quote['status'] == 4)
                                       <div class="new_lable q_accepted_table">ACCEPTED</div>
                                       @else
                                       <div class="new_lable">REJECTED</div>
                                       @endif
                                       <div class="created_date">{{$date}}</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">General user:</span>
                                          <span>{{$quote['get_gen_user']['first_name']}} {{$quote['get_gen_user']['last_name']}}</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Mobile Number:</span>
                                          <span>{{$quote['get_quotes']['phone_number']}}</span>
                                       </div>
                                    </div>
                                    <div class="Q_description">
                                       <p>{{$quote['get_quotes']['work_description']}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           @endforeach
                        
                          
                           </div>
                           <!-- <div class="load_more"><a href="JavaScript:;">Load more</a></div> -->
                        </div>
                        <div class="tab-pane container fade" id="Questions">
                           <div class="search_filter">
                              <h1>Search filter</h1>
                              <div class="row  searchf_input">
                                 <div class="form-group custom_errow col-md-6 col-12">
                                    <label for="inputPassword4">Status</label>
                                    <select class="form-control " id="exampleSelect1">
                                       <option>New and Answered</option>
                                       <option>2</option>
                                       <option>3</option>
                                       <option>4</option>
                                       <option>5</option>
                                    </select>
                                    <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                    <label for="inputPassword4">Keyword</label>
                                    <input type="text" class="form-control" id="inputPassword4" required="">
                                 </div>
                              </div>
                              <div class="search_btn">
                                 <a href="javascript:;">Search</a>
                              </div>
                           </div>
                           <div class="quote_section">
                              <a href="question_detail.html" class="new_quote">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                    <div class="created_date_for_mobile">
                                       <span class="c_time">17:40</span>
                                       <span class="c_date">14/07/2018</span>
                                    </div>
                                    <div class="Q_tag">
                                       <div class="new_lable">NEW</div>
                                       <div class="created_date">14/07/2018</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">House type:</span>
                                          <span>Private land</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Required task:</span>
                                          <span>Design house</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Design type: </span>
                                          <span>Modern</span>
                                       </div>
                                    </div>
                                    <div class="Q_description">
                                       <p>Hello my name is Moshe and i'm looking for design of a new house</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="quote_section">
                              <a href="javascript:;" class="new_quote q_accepted">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                    <div class="Q_tag">
                                       <div class="new_lable q_accepted_table">ANSWER</div>
                                       <div class="created_date">14/07/2018</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">House type:</span>
                                          <span>Private land</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Required task:</span>
                                          <span>Design house</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Design type: </span>
                                          <span>Modern</span>
                                       </div>
                                    </div>
                                    <div class="Q_description">
                                       <p>Hello my name is Moshe and i'm looking for design of a new house</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="quote_section">
                              <a href="javascript:;" class="new_quote q_accepted">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                    <div class="Q_tag">
                                       <div class="new_lable q_accepted_table">ANSWER</div>
                                       <div class="created_date">14/07/2018</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">House type:</span>
                                          <span>Private land</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Required task:</span>
                                          <span>Design house</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Design type: </span>
                                          <span>Modern</span>
                                       </div>
                                    </div>
                                    <div class="Q_description">
                                       <p>Hello my name is Moshe and i'm looking for design of a new house</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="load_more"><a href="JavaScript:;">Load more</a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection