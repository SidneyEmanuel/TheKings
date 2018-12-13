import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';





import { CarrinhoPage } from '../pages/carrinho/carrinho';
import { ContactPage } from '../pages/contact/contact';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';
import { SlidePage } from '../pages/slide/slide';



import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { ServicosProvider } from '../providers/servicos/servicos';
import { HttpModule } from '@angular/http';



@NgModule({
  declarations: [
    MyApp,
    CarrinhoPage,
    ContactPage,
    HomePage,
    TabsPage,
    SlidePage
    
    
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
    HttpModule
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    CarrinhoPage,
    ContactPage,
    HomePage,
    TabsPage,
    SlidePage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    ServicosProvider
  ]
})
export class AppModule {}
