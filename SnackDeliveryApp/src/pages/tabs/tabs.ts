import { Component } from '@angular/core';

import { CarrinhoPage } from '../carrinho/carrinho';
import { ContactPage } from '../contact/contact';
import { SlidePage } from '../slide/slide';





@Component({
  templateUrl: 'tabs.html'
})
export class TabsPage {

  tab2Root = CarrinhoPage;
  tab3Root = ContactPage;
  tab4Root = SlidePage;
  
  

  constructor() {

  }
}
