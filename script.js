let currentIndex = 1;

function showBanner(index) {
  document.querySelectorAll('.banner_tmd > div').forEach(banner => {
    banner.style.display = 'none';
  });
  const currentBanner = document.querySelector(`.banner_item${index}_tmd`);
  currentBanner.style.display = 'flex';
  currentIndex = index;
}

function prevBanner() {
  currentIndex = (currentIndex === 1) ? 3 : currentIndex - 1;
  showBanner(currentIndex);
}

function nextBanner() {
  currentIndex = (currentIndex === 3) ? 1 : currentIndex + 1;
  showBanner(currentIndex);
}


function nextsp_tmd() {
  const items = document.querySelectorAll('.list_item1_new_tmd');
  const totalItems = items.length;

  if (totalItems > 4) {
    if (currentIndex < totalItems - 4) {
      currentIndex++;
    } else {
      currentIndex = 0;
    }
    updateTransform();
  } else {

    currentIndex = 0;
    updateTransform();
  }
}

function prevsp_tmd() {
  const items = document.querySelectorAll('.list_item1_new_tmd');
  const totalItems = items.length;

  if (totalItems > 4) {
    if (currentIndex > 0) {
      currentIndex--;
    } else {
      currentIndex = totalItems - 4;
    }
    updateTransform();
  } else {
    currentIndex = 0;
    updateTransform();
  }
}

function updateTransform() {
  const items = document.querySelectorAll('.list_item1_new_tmd');
  const itemWidth = items[0].offsetWidth;
  const margin = 20;
  const transformValue = -currentIndex * (itemWidth + margin) + 'px';

  items.forEach(item => {
    item.style.transform = 'translateX(' + transformValue + ')';
  });
}
function btnspPb() {
  document.querySelector('.list_items_bc_tmd').style.display = 'none';
  document.querySelector('.list_items_km_tmd').style.display = 'none';
  document.querySelector('.list_items_pb_tmd').style.display = 'flex';
}

function btnspKm() {
  document.querySelector('.list_items_km_tmd').style.display = 'flex';
  document.querySelector('.list_items_pb_tmd').style.display = 'none';
  document.querySelector('.list_items_bc_tmd').style.display = 'none';
}
function btnspBc() {
  document.querySelector('.list_items_bc_tmd').style.display = 'flex';
  document.querySelector('.list_items_pb_tmd').style.display = 'none';
  document.querySelector('.list_items_km_tmd').style.display = 'none';
}




