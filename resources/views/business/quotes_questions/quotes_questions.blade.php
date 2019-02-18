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
                           <div class="search_filter">
                              <h1>Search filter</h1>
                              <div class="row  searchf_input">
                                 <div class="form-group custom_errow col-md-6 col-12">
                                    <label for="inputPassword4">Status</label>
                                    <select class="form-control " id="exampleSelect1">
                                       <option>New and accepted</option>
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
                              <a href="quote_request.html" class="new_quote">
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
                              <a href="quote_accepted.html" class="new_quote q_accepted">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                    <div class="Q_tag">
                                       <div class="new_lable q_accepted_table">ACCEPTED</div>
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
                              <a href="quoted_quote.html" class="new_quote q_quoted">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                    <div class="Q_tag">
                                       <div class="new_lable q_quoted_table">QUOTED</div>
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