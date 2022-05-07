import { Component, OnInit } from '@angular/core';
import {NavController} from "@ionic/angular";
import {ActivatedRoute,Router} from "@angular/router";

@Component({
  selector: 'app-data-sender',
  templateUrl: './data-sender.page.html',
  styleUrls: ['./data-sender.page.scss'],
})
export class DataSenderPage implements OnInit {
  textData: string;

  constructor(private navCtrl: NavController,private router: Router, private  route: ActivatedRoute) {
    this.textData=this.route.snapshot.paramMap.get('extra-data');
  }

  ngOnInit() {
  }

  sendDataToHome(){
    this.router.navigate(['/home',{
      'from-data-sender': this.textData
    }]);
  }

}
