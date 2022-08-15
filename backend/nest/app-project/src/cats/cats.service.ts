import { Injectable } from '@nestjs/common';
import { Cat } from './interfaces/cat.interface';

@Injectable()
export class CatsService {
  private readonly cats: Cat[] = [];
  constructor() {}
  create(cat: Cat) {
    this.cats.push(cat);
  }

  findOne(id: number) {
    return this.cats.find(item => item.id == id);
  }

  findAll(): Cat[] {
    console.log('finall');
    return this.cats;
  }
}
