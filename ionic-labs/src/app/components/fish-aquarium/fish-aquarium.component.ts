import {Component,EventEmitter, Input, OnInit, Output} from '@angular/core';
import {FishAquarium} from '../../service/data-getter.service';

@Component({
  selector: 'app-fish-aquarium',
  templateUrl: './fish-aquarium.component.html',
  styleUrls: ['./fish-aquarium.component.scss'],
})
export class FishAquariumComponent implements OnInit {
  @Input() fishAquarium: FishAquarium;
  @Input() isNew: boolean;
  @Output() addAquarium = new EventEmitter();
  @Output() cancelAddingAquarium = new EventEmitter();
  title: string;

  constructor() {
  }

  ngOnInit() {
    if (this.isNew) {
      this.fishAquarium = {
        form: '',
        numb: null,
        size: null,
        isBackLight: null,
        fishs:[]
      };
      this.title = 'New Aquarium';
    }
  }
  addNew() {

    if(this.isNew) {
      this.addAquarium.emit(this.fishAquarium);
    }
  }
  cancelAdding(){
    if(this.isNew){
      this.cancelAddingAquarium.emit();
    }
  }
}
