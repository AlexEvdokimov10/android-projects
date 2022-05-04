import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AquriumComponent } from './aqurium.component';

describe('AquriumComponent', () => {
  let component: AquriumComponent;
  let fixture: ComponentFixture<AquriumComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AquriumComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AquriumComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
