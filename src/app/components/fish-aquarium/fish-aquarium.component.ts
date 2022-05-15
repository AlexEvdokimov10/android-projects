import {Component,EventEmitter, Input, OnInit, Output} from '@angular/core';
import {DataGetterService, FishAquarium} from '../../service/data-getter.service';

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

  constructor(private dataGetter:DataGetterService) {
  }

  ngOnInit() {
    if (this.isNew) {
      this.fishAquarium = {
        id:null,
        form: '',
        numb: null,
        size: null,
        isBackLight: null,
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
  saveAquarium(){
    this.dataGetter.editAquarium(this.fishAquarium).subscribe(
      data=>console.log(data)
    );
  }
}
