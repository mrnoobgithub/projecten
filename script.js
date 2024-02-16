// Define loot items along with their probabilities and rarities.
const lootItems = [
    { name: "Common Sword", probability: 0.7, rarity: "Common" },      // 70.9% chance
    { name: "Rare Shield", probability: 0.25, rarity: "Rare" },       // 30% chance
    { name: "Epic Armor", probability: 0.08, rarity: "Epic" },        // 8% chance
    { name: "Legendary Potion", probability: 0.02, rarity: "Legendary" }, // 2% chance
    { name: "Mythical Ring", probability: 0.001, rarity: "Mythical" }     // 0.1% chance
];

// Inventory to store rolled items
const inventory = {};

// Function to update inventory
function updateInventory() {
    const inventoryList = document.getElementById('inventoryList');
    inventoryList.innerHTML = '';
    
    // Convert inventory object to array for sorting
    const inventoryArray = Object.entries(inventory);
    
    // Sort items by rarity
    inventoryArray.sort((a, b) => {
      const rarityOrder = {
        "Common": 1,
        "Rare": 2,
        "Epic": 3,
        "Legendary": 4,
        "Mythical": 5
      };
      return rarityOrder[a[1].rarity] - rarityOrder[b[1].rarity];
    });
  
    // Update inventory list with sorted items
    for (const [itemName, itemData] of inventoryArray) {
      const li = document.createElement('li');
      li.textContent = `${itemData.count} x ${itemName}`;
      li.classList.add(itemData.rarity.toLowerCase());
      inventoryList.appendChild(li);
    }
  }
  

// Function to update odds list
function updateOdds() {
    const oddsList = document.getElementById('oddsList');
    oddsList.innerHTML = '';
    lootItems.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.name}: ${item.probability * 100}%`;
        li.classList.add(item.rarity.toLowerCase());
        oddsList.appendChild(li);
    });
}

// Function to randomly select a loot item based on adjusted odds
function getRandomItem() {
    // Generate a random number between 0 and 1
    const randomNumber = Math.random();

    // Calculate cumulative probabilities
    let cumulativeProbability = 0;
    for (let i = 0; i < lootItems.length; i++) {
        cumulativeProbability += lootItems[i].probability;
        if (randomNumber < cumulativeProbability) {
            const itemName = lootItems[i].name;
            const itemRarity = lootItems[i].rarity;
            if (!inventory[itemName]) {
                inventory[itemName] = { count: 0, rarity: itemRarity };
            }
            inventory[itemName].count++;
            updateInventory();
            return itemName;
        }
    }
}

// Event listener for the lootbox button
document.getElementById('openButton').addEventListener('click', function () {
    const resultElement = document.getElementById('result');
    const item = getRandomItem();
    resultElement.textContent = `You received: ${item}`;
});

// Initial update of odds and inventory
updateOdds();
updateInventory();
